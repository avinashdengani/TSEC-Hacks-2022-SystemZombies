const base_url = "https://api.github.com/";

function ajaxFunction(target) {
    let resultJSON = null;
    $.ajax({
        url: target,
        method: 'GET',
        dataType: 'json',
        async : false,
        success: function(result) {
            resultJSON = result ?? [];
        },
        error: function (error){
            resultJSON = [];
        }
    });
    return resultJSON;
}


function getUser(username) {
    let sub_url = `users/${username}`;
    return ajaxFunction(base_url + sub_url);
}


function getRepos(username, page, per_page) {
    let sub_url = `users/${username}/repos?page=${page}&per_page=${per_page}`;
    return ajaxFunction(base_url + sub_url);
}

function getRepoNames(username) {
    let repos = getRepos(username);
    let repoNames = [];
    repos.forEach((repo) => {
        repoNames.push(repo.name);
    });
    return repoNames;
}

function getRepoFullNames(username) {
    let repos = getRepos(username);
    let repoNames = [];
    repos.forEach((repo) => {
        repoNames.push(repo.full_name);
    });
    return repoNames;
}

function getRepo(username, repo_name) {
    let sub_url = `repos/${username}/${repo_name}`;
    return ajaxFunction(base_url+sub_url);
}

function getCommits(username, repo_name, page, per_page) {
    let sub_url = `repos/${username}/${repo_name}/commits?page=${page}&per_page=${per_page}`;
    return ajaxFunction(base_url+sub_url);
}

function getCommitMessages(username, repo_name, page, per_page) {
    let commitsJSON = getCommits(username, repo_name, page, per_page);

    let commitMessages = [];
    commitsJSON.forEach((commit) => {
        commitMessages.push(commit["commit"]["message"]);
    });

    return commitMessages.reverse();
}

function getLatestCommitMessage(username, repo_name) {
    let sub_url = `repos/${username}/${repo_name}/commits?page=-1&per_page=1`;
    let data =  ajaxFunction(base_url + sub_url);
    if(data && data.length > 0){
        data[0]["commit"]["message"];
    }
    return "";
}

function getLanguages(username, repo_name) {
    let sub_url = `repos/${username}/${repo_name}/languages`;
    return Object.keys(ajaxFunction(base_url+sub_url));
}

function getLanguagesUsedByUser(username) {
    let langs = new Set();
    let repos = getRepoNames(username);
    repos.forEach(repo => {
        getLanguages(username, repo).forEach(lang => {
            langs.add(lang);
        });
    });
    return [...langs];
}

function getAvatar(username) {
    return getUser(username).avatar_url;
}

function getUserSuggestionsAccordingToLanguages(username, page = 1, per_page = 2, links = false) {
    let languages = getLanguagesUsedByUser(username);
    let random = Math.floor(Math.random() * languages.length);
    let sub_url = `search/repositories?q=${languages[random]}?page=${page}&per_page=${per_page}`

    let commonUsersJSON = ajaxFunction(base_url + sub_url);

    let commonUsers = [];
    commonUsersJSON['items'].forEach((commonUser) => {
        if(links) 
            commonUsers.push(commonUser["owner"]["html_url"]);
        else
            commonUsers.push(commonUser["owner"]["login"]);
    });
    return commonUsers;
}

function getColonStyleCommitScore(username) {
    let commitMessages = getCommitMessages(username, getRepoNames(username).reverse()[0]);
    let len = commitMessages.length;
    let count = 0;
    commitMessages.forEach((commitMessage) => {
        if (commitMessage.includes(':')) {
            count++;
        }
    });
    return (count/len) > 0.6;  
}

function getUserSuggestionsAccordingToCommitStyle(users) {
    let passedUsers = [];
    users.forEach( (u) => {
        if(getColonStyleCommitScore(u))
            passedUsers.push(u);
    });
    return passedUsers;
}

function getSuggestedProjects(username, page = 1, per_page = 2, links = false) {
    let languages = getLanguagesUsedByUser(username);
    let random = Math.floor(Math.random() * languages.length);
    let sub_url = `search/repositories?q=${languages[random]}?page=${page}&per_page=${per_page}`;

    let suggestedProjects = ajaxFunction(base_url + sub_url);

    return suggestedProjects;
}

// console.log(getUserSuggestionsAccordingToCommitMessages("krishanadave617"));