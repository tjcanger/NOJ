<?php

return [
    'my'         => 'My Groups',
    'trending'   => 'Trending Groups',
    'members'    => '{0} :count Members|{1} :count Member|[2,*] :count Members',
    'create'     => [
        'title' => 'Create a New Group',
        'description' => 'Click here to create your own group!',
        'groupName' => 'Group Name',
        'shortCode' => 'Short Code',
        'description' => 'Group Description',
        'joinPolicy' => 'Join Policy',
        'inviteOnly' => 'Invite only',
        'applyOnly' => 'Apply only',
        'both' => 'Both',
        'public' => 'Public',
        'create' => 'Create',
        'errorInvalidValue' => 'The length of the name and short code should be less than 50 and greater than 3 <br /> The description length should be less than 60000',
        'errorImageLarge' => 'The selected img id too large'
    ],
    'detail' => [
        'reportAbuse' => 'Report Abuse',
        'public' => 'Public',
        'private' => 'Private',
        'group' => 'Group',
        'tags' => 'Tags:',
        'acceptInvitation' => 'Accept Invitation',
        'joined' => 'Joined',
        'exit' => 'Exit',
        'inviteOnly' => 'Invite Only',
        'join' => 'Join',
        'waiting' => 'Waiting',
        'description' => 'Description',
        'leader' => 'Leader',
        'invitation' => 'Invitation',
        'application' => 'Application',
        'joinPolicy' => 'Join Policy',
        'contestCount' => ':ahead Ahead, :going On Going, :passed Passed',
        'contests' => 'Contests',
        'createTime' => 'CreateTime',
        'analysis' => 'Analysis',
        'notice' => 'Notice',
        'homework' => 'Homework',
        'contest' => 'Contest',
        'invite' => 'Invite',
        'problems' => 'Problems',
        'settings' => 'Settings',
        'nothingTimeline' => 'Nothing in the timeline',
        'contestTitle' => 'Title',
        'contestBeginTime' => 'Begin Time',
        'myProfile' => 'My Profile',
        'edit' => 'Edit',
        'nickname' => 'Nick Name',
        'none' => 'None',
        'subGroup' => 'Sub Group',
        'members' => 'Members',
        'kick' => 'Kick',
        'approve' => 'Approve',
        'decline' => 'Decline',
        'retrieve' => 'Retrieve',
        'noticeAnnouncement' => 'Notice Announcement',
        'noticeTitle' => 'Title',
        'noticeContent' => 'Content',
        'noticeClose' => 'Close',
        'noticeSubmit' => 'Submit',
        'inviteMember' => 'Invite Member',
        'inviteEmail' => 'E-mail',
        'inviteClose' => 'Close',
        'inviteConfirm' => 'Submit',
        'profile' => 'Profile',
        'profileClose' => 'Close',
        'profileApply' => 'Apply'
    ],
    'message'    => [
        'agreeJoin' => [
            'title'   => 'Some users agreed to join your group :name',
            'content' => ''
        ],
        'appliedJoin'=> [
            'title'   => 'Some users applied to join your group :name',
            'content' => ''
        ],
        'inviteJoin' => [
            'title'   => ':sender_name invites you to group :group_name',
            'content' => 'Hi, Dear **:reciver_name**,\n\n  **:sender_name** has just invited you to join the group **[:group_name](:group_url)**. Take a look and meet other fascinating people right now!\n\nSincerely, NOJ'
        ]
    ],
    'general' => [
        'groupName' => 'Group Name',
        'changeNameTip' => 'Enter the new name displayed for your group',
        'joinPolicy' => 'Join Policy',
        'invitation' => 'Invitation',
        'application' => 'Application',
        'invitationOnly' => 'Invitation only',
        'applicationOnly' => 'Application only',
        'changeGroupImage' => 'Change Group Image',
        'changeGroupImageTip' => 'Click image to upload a local file as new focus image',
        'errorAvatarFast' => 'SLOW DOWN',
        'errorChosseLocalFile' => 'PLEASE CHOOSE A LOCAL FILE',
        'errorFileLarge' => 'THE SELECTED FILE IS TOO LARGE',
    ],
    'member' => [
        'permissionManagement' => 'Permission Management',
        'promote' => 'Promote',
        'demote' => 'Demote',
        'groupAnnouncement' => 'Group Announcement',
        'title' => 'Title',
        'content' => 'Content',
        'submit' => 'Submit',
        'modifySubGroup' => 'Modify Sub Group',
        'modifySubGroupContent1' => 'change ',
        'modifySubGroupContent2' => '\'s subgroup to',
        'subGroup' => 'Sub Group'
    ],
    'analysis' => [
        'title' => 'Practice Contest Analysis',
        'contests' => 'Contests',
        'tags' => 'Tags',
        'developing' => 'Developing...',
        'downloadAsExcel' => 'download as excel',
        'showByPercent' => 'Show By Percent',
        'hideMaximum' => 'Hide Maximum',
        'tips' => '<p>something you can do.</p><p>Click the attribute name below total or each contest to sort.</p><p> Click on the name of a member to ignore/unignore him.</p><p> click on the Elo rate of a member to see his elo rate change history.',
        'eloChangeHistory' => 'Elo Change History',
        'contestName' => 'Contest Name',
        'afterContestElo' => 'After Contest Elo',
        'close' => 'Close',
        'tagRader' => 'Tag Radar',
        'chartLabelElo' => 'Elo Rate',
        'chartLabelTag' => 'Tag Complete',
    ],
    'common' => [
        'backToGroupPage' => 'Back to Group Page',
        'generalSettings' => 'General Settings',
        'memberSettings' => 'Member Settings',
        'problemsManagement' => 'Problems Management',
        'contestManagement' => 'Contest Management',
        'homeworkManagement' => 'Homework Management',
        'practiceAnalysis' => 'Practice Analysis',
        'dangerField' => 'Danger Field'
    ],
    'homework'=>[
        'create' => 'Create Homework',
        'list' => 'All Homework',
        'title' => 'Homework Title',
        'description' => 'Homework Description',
        'ended_at' => 'Homework Deadline',
    ],
    'contest' =>[
        'arrangeContest' => 'Arrange Contest' ,
        'arrange' => 'Arrange',
        'successArrange' => 'Contest arrange successful, do you need to jump to the contest page?',
        'jumpTo' => 'jump to',
        'return' => 'return',
        'assignee' => 'Assignee',
        'contestName' => 'Contest Name',
        'contestBeginTime' => 'Contest Begin Time',
        'contestEndTime' => 'Contest End Time',
        'publicContest' => 'Public Contest',
        'practiceContest' => 'Practice Contest',
        'statusVisibility' => 'Status Visibility',
        'viewAll' => 'All View',
        'viewOnlyOnself' => 'View only oneself',
        'viewNothing' => 'View Nothing',
        'problems' => 'Problems',
        'no' => '#',
        'code' => 'Code',
        'score' => 'Score',
        'opr' => 'Op.',
        'addProblem' => 'Add Problem',
        'description' => 'Description',
        'update' => 'update',
        'assignMember' => 'Assign a Member',
        'cancel' => 'Cancel',
        'problemCode' => 'Problem Code',
        'close' => 'Close',
        'add' => 'Add',
        'errorContestTimeShort' => 'Contest length should be at least one minute.',
        'noChargeContest' => 'You are not in charge of any contest.',
        'noContestInGroup' => 'No contest has been created in this group',
        'noOneAssigned' => 'There is no one assigned. Click to assign one',
        'deleteProblemTip' => 'Delete this problem',
        'errorProblemNonExist' => 'Problem Doesn\'t Exist',
        'errorLoading' => 'loading a contest info ,slow down!',
        'errorEmptyName' => 'Contest Name Shoudn\'t be empty',
        'errorEmptyBeginTime' => 'Contest Begin Time Shoudn\'t be empty',
        'errorEmptyEndTime' => 'Contest End Time Shoudn\'t be empty',
    ],
    'problem' => [
        'title' => 'Group Problems Management',
        'empty' => 'There are no questions in the group that allow you to operate',
        'no' => '#',
        'problem' => 'Problem',
        'addTagTip' => 'add a tag to this problem',
        'removeTagTip' => 'click to remove this tag',
        'deleteTagConfirm' => 'Are you sure to delete this tag',
        'errorTagNameEmpty' => 'The tag name cannot be empty'
    ],
    'danger' => [
        'groupEloRanking' => 'Group Elo Ranking',
        'refresh' => 'Refresh',
    ]
];
