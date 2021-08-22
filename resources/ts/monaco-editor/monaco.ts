import type { LanguageId } from './register';
import type { ScopeName, TextMateGrammar, ScopeNameInfo } from './providers';
import * as monaco from 'monaco-editor/esm/vs/editor/editor.api';
import { createOnigScanner, createOnigString, loadWASM } from 'vscode-oniguruma';
import { SimpleLanguageInfoProvider } from './providers';
import { registerLanguages } from './register';
import { rehydrateRegexps } from './configuration';
import VsCodeDarkTheme from './themes/vs-dark-plus-theme';
import { IRawTheme } from 'vscode-textmate';
import { languagesConfig } from './languages';

self.MonacoEnvironment = {
    getWorkerUrl: function (moduleId, label) {
        if (label === 'json') {
            return '/static/js/build/worker/json.js';
        }
        if (label === 'css' || label === 'scss' || label === 'less') {
            return '/static/js/build/worker/css.js';
        }
        if (label === 'html' || label === 'handlebars' || label === 'razor') {
            return '/static/js/build/worker/html.js';
        }
        if (label === 'typescript' || label === 'javascript') {
            return '/static/js/build/worker/ts.js';
        }
        return '/static/js/build/worker/editor.js';
    }
}

interface NOJScopeNameInfo extends ScopeNameInfo {
    path: string;
}

// main('python', 'vs', 'vscode_container');

async function main(language: LanguageId, themeKey: string, elementID: string, defaultValue: string) {
    let supportLang = [
        'c',
        'cpp',
        'csharp',
        'css',
        'elixir',
        'erlang',
        'go',
        'html',
        'java',
        'javascript',
        'kotlin',
        'php',
        'python',
        'racket',
        'ruby',
        'rust',
        'scala',
        'swift',
        'typescript'
    ];
    let _languagesArray = JSON.parse(languagesConfig);
    let languagesArray = {};
    _languagesArray.forEach((value) => {
        languagesArray[value.id] = value;
    });
    const languages: monaco.languages.ILanguageExtensionPoint[] = [
        {
            id: 'python',
            extensions: languagesArray['python'].extensions,
            aliases: languagesArray['python'].aliases,
            firstLine: languagesArray['python'].firstLine,
        },
        {
            id: 'c',
            extensions: languagesArray['c'].extensions,
            aliases: languagesArray['c'].aliases
        },
        {
            id: 'cpp',
            extensions: languagesArray['cpp'].extensions,
            aliases: languagesArray['cpp'].aliases
        },
        {
            id: 'cuda-cpp',
            extensions: [".cu", ".cuh"],
            aliases: ["CUDA C++"],
        },
        {
            id: 'csharp',
            extensions: languagesArray['csharp'].extensions,
            aliases: languagesArray['csharp'].aliases,
        },
        {
            id: 'kotlin',
            extensions: languagesArray['kotlin'].extensions,
            aliases: languagesArray['kotlin'].aliases,
            mimetypes: languagesArray['kotlin'].mimetypes
        },
        {
            id: 'css',
            extensions: languagesArray['css'].extensions,
            aliases: languagesArray['css'].aliases,
            mimetypes: languagesArray['css'].mimetypes
        },
        {
            id: 'html',
            extensions: languagesArray['html'].extensions,
            aliases: languagesArray['html'].aliases,
            mimetypes: languagesArray['html'].mimetypes
        },
        {
            id: 'javascript',
            extensions: languagesArray['javascript'].extensions,
            aliases: languagesArray['javascript'].aliases,
            mimetypes: languagesArray['javascript'].mimetypes,
            firstLine: languagesArray['javascript'].firstLine,
            filenames: languagesArray['javascript'].filenames,
        },
        {
            id: 'php',
            extensions: languagesArray['php'].extensions,
            aliases: languagesArray['php'].aliases,
            mimetypes: languagesArray['php'].mimetypes
        },
    ];
    const grammars: { [scopeName: string]: NOJScopeNameInfo } = {
        'source.python': {
            language: 'python',
            path: 'python.tmLanguage.json',
        },
        'source.cpp.embedded.macro': {
            path: "cpp.embedded.macro.tmLanguage.json"
        },
        'source.c.platform': {
            path: "c.platform.tmLanguage.json"
        },
        'source.c': {
            language: 'c',
            path: 'c.tmLanguage.json',
        },
        'source.cpp': {
            language: 'cpp',
            path: 'cpp.tmLanguage.json',
        },
        'source.csharp': {
            language: 'csharp',
            path: 'csharp.tmLanguage.json',
        },
        'source.cuda-cpp': {
            language: 'cuda-cpp',
            path: 'cuda-cpp.tmLanguage.json',
        },
        'source.kotlin': {
            language: 'kotlin',
            path: 'kotlin.tmLanguage',
        },
        'source.css': {
            language: 'css',
            path: 'css.tmLanguage.json',
        },
        'text.html.basic': {
            path: 'html.tmLanguage.json',
        },
        'text.html.derivative': {
            language: 'html',
            path: 'html-derivative.tmLanguage.json',
        },
        'source.js': {
            path: 'javascript.tmLanguage.json',
        },
        'source.js.jsx': {
            language: 'javascript',
            path: 'javascript-react.tmLanguage.json',
        },
        'source.php': {
            path: 'php.tmLanguage.json',
        },
        'text.html.php': {
            language: "php",
            path: "html-php.tmLanguage.json",
        },
    };

    const fetchGrammar = async (scopeName: ScopeName): Promise<TextMateGrammar> => {
        const { path } = grammars[scopeName];
        const uri = `/static/language-services/grammars/${path}`;
        const response = await fetch(uri);
        const grammar = await response.text();
        const type = path.endsWith('.json') ? 'json' : 'plist';
        return { type, grammar };
    };

    const fetchConfiguration = async (
        language: LanguageId,
    ): Promise<monaco.languages.LanguageConfiguration> => {
        const uri = `/static/language-services/configurations/${language}.json`;
        const response = await fetch(uri);
        const rawConfiguration = await response.text();
        return rehydrateRegexps(rawConfiguration);
    };

    const data: ArrayBuffer | Response = await loadVSCodeOnigurumWASM();
    loadWASM(data);
    const onigLib = Promise.resolve({
        createOnigScanner,
        createOnigString,
    });

    const provider = new SimpleLanguageInfoProvider({
        grammars,
        fetchGrammar,
        configurations: languages.map((language) => language.id),
        fetchConfiguration,
        theme: getTheme(themeKey),
        onigLib,
        monaco,
    });
    registerLanguages(
        languages,
        (language: LanguageId) => provider.fetchLanguageInfo(language),
        monaco,
    );

    const value = defaultValue;
    const id = elementID;
    const element = document.getElementById(id);
    if (element == null) {
        throw Error(`could not find element #${id}`);
    }

    let editor = monaco.editor.create(element, {
        value,
        language,
        theme: themeKey,
        fontSize: 16,
        formatOnPaste: true,
        formatOnType: true,
        automaticLayout: true,
        minimap: {
            enabled: true,
        },
    });

    provider.injectCSS();

    return editor;
}

async function loadVSCodeOnigurumWASM(): Promise<Response | ArrayBuffer> {
    const response = await fetch('/static/library/vscode-oniguruma/release/onig.wasm');
    const contentType = response.headers.get('content-type');
    if (contentType === 'application/wasm') {
        return response;
    }

    return await response.arrayBuffer();
}

function getTheme(themeKey: string): IRawTheme {
    return VsCodeDarkTheme;
}

window.NOJEditor = class NOJEditor {
    create(language, themeKey, elementID, defaultValue) {
        return main(language, themeKey, elementID, defaultValue);
    }
    monaco = monaco;
    editor;
}
