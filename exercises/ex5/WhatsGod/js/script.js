window.onload = () => {
    const REQ = "address=&action="
    const navigationViews = [
        { url: 'leaderboard', history: true },
        { url: 'challenge', history: true },
        { url: 'profile', history: false }
    ]

    const state = {
        game: {
            playthrough: {
                story: "You are a",
                name: "Mere Mortal",
                src: "assets/svg/mere-mortal.svg"
            },
            godCharacter: {
                story: "Devoting your life to",
                name: "Deadpool",
                src: "assets/svg/deadpool.svg"
            },
            scenerio: {
                story: "Time to face your",
                name: "Judgement",
                src: "assets/svg/hammer.svg"
            },
            timeLimit: {
                story: "You have",
                name: "10 minutes",
                src: "assets/svg/clock.svg"
            }
        },
        player: {
            name: "IZnoR",
            src: 'assets/svg/asafBig.svg',
            rank: 5,
            turingTest: true,
            exp: 0.85,
            position: 93,
            winRate: 0.83,
            score: 7433,
            email: "asafbasaf@gmail.com"
        }
    }

    const display = {
        rivalProfile: function (rival) {
            pushHistory(rival.name);
            display.profile(rival)
        },
        leaderboard: function () {
            $("#app").css('display', 'flex')
            $("#leaderboard").css('display', 'block')
            $.post('../server.php', REQ + "getLeaderboard", function (data) {
                let rivals = JSON.parse(data)
                $(".leaderboard-list").empty()
                rivals.map((rival) => {
                    const gamesWon = Math.floor(rival.totalGames * rival.winRate)
                    const gamesLost = Math.floor(rival.totalGames * (1 - rival.winRate))
                    const winPercentage = rival.winRate * 100;
                    $(".leaderboard-list").append(
                        `<li>
                            <div class="player-details" id="${`leaderboard-player-${rival.position}`}">
                                <span class="player-avatar-container">
                                    <img class="player-avatar click" src="${rival.src}" alt="flex">
                                </span>
                                <span class="player-name">${rival.name}</span>
                            </div>
                            <span class="player-score">${rival.score.toLocaleString()}</span>
                            <div class="player-win-rate">
                                <div class="player-win-rate-graphic">
                                    <span class="win" style="width:${winPercentage}%">${gamesWon.toLocaleString()}</span>
                                    <span class="lose">${gamesLost.toLocaleString()}</span>
                                </div>
                                <span class="player-win-rate-perc">${winPercentage}%</span>
                            </div>
                        </li>`
                    );
                    $(`#leaderboard-player-${rival.position} .player-avatar-container`).click(() => {
                        display.rivalProfile(rival)
                    })
                })
            });
            $('.leaderboard-search').click(() => {
                $('#leaderboard-search-input').focus()
            })
        },

        challenge: function () {
            const gamePicks = Object.keys(state.game)
            $('#challenge').empty()
            $('#challenge').append(`
            ${gamePicks.map((key, index) => {
                const { story, name, src } = state.game[key]
                return `
                    <p class="player-desc">${story}</p>
                    <button class="player-pick">
                        <img src="${src}">
                        <p>${name}</p>
                    </button>
                    ${(index !== gamePicks.length - 1) ? `
                    <div class="tiny-circles">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>`: ''}
                `
            }).join("")}
            <div class="challenge-start-bg">
                <button id="challenge-start">GO</button>
            </div>
            
            `)
            $("#app").css('display', 'flex')
            $("#challenge").css('display', 'block')

        },
        profile: function (player) {
            const { src, name, rank, turingTest, exp, position, winRate, score, email } = player || state.player
            const rankExp = 200 * rank
            const currentExp = exp * rankExp
            $('#profile').empty()
            $('#profile').append(`
            <a href="#" class="back-to-main"><img src="assets/svg/back.svg" /></a>
            <img class="player-avatar" src="${src}" />
            <h1 class="player-name">${name}</h1>
            <h5 class="player-rank">Rank ${rank}</h5>
            <section class="profile-menu">
            ${player ? '' :
                    `<button class="edit-btn">
                    <img src="assets/svg/pencil.svg" />
                    <span>Edit</span>
                    <img class="go-forward" src="assets/svg/back.svg" />
                </button>
                <section class="info-section">
                    <div class="icon-circle">
                        <img src="assets/svg/robot.svg" />
                    </div>
                    <span class="title">Turing Test</span>
                    <label class="switch">
                        <input type="checkbox" checked=${turingTest}>
                        <span class="slider round"></span>
                    </label>
                    </section>`
                }
              
                <h3>Achievments</h3>
                <div class="exp-meter">
                    <div class="exp-meter-fill" style="width:${Math.floor(exp * 100)}%;">
                        <span>XP</span>
                        <span>${currentExp}/${rankExp}</span>
                    </div>
                </div>
                <section class="info-section">
                    <div class="icon-circle">
                        <img src="assets/svg/planet.svg" />
                    </div>
                    <span class="title">Position</span>
                    <span class="description">${position.toLocaleString()}</span>
                </section>
                <div class="separator"></div>
                <section class="info-section">
                    <div class="icon-circle">
                        <img src="assets/svg/meter.svg" />
                    </div>
                    <span class="title">Turing Ratio</span>
                    <span class="description">${Math.floor(winRate * 100)}%</span>
                </section>
                <div class="separator"></div>
                <section class="info-section">
                    <div class="icon-circle">
                        <img src="assets/svg/medal.svg" />
                    </div>
                    <span class="title">Score</span>
                    <span class="description">${score.toLocaleString()}</span>
                </section>
                ${player ? '' :
                    `
                    <h3>Privacy</h3>
                    <section class="info-section">
                        <div class="icon-circle">
                            <img src="assets/svg/email.svg" />
                        </div>
                        <span class="title">E-Mail</span>
                        <span class="description">${email}</span>
                    </section>
                </section>`}
            `)
            $('#app').css('display', 'none')
            $('#profile').css('display', 'flex')
            $('.back-to-main').click(() => {
                history.back()
            })
        }
    }

    function pushHistory(pushURL) {
        history.pushState({}, null, `${pushURL}`);
    }

    function initApp(urlParams, pushURL = false) {
        for (view of navigationViews) {
            if (urlParams.includes(view.url)) {
                changeView(view.url)
                if (pushURL) pushHistory(urlParams);
                return
            }
        }
        if (pushURL) pushHistory('challenge');
        changeView('challenge')
    }

    initApp(window.location.pathname, true)

    $(window).on('popstate', function () {
        initApp(window.location.pathname);
    });

    function changeView(url) {
        $(`.${url}`).addClass('selected')
        display[url]()
        navigationViews.map((otherView) => {
            if (otherView.url !== url) {
                $(`#${otherView.url}`).css('display', 'none')
                $(`.${otherView.url}`).removeClass('selected')
            }
        })
    }


    navigationViews.map((view) => {
        $(`.${view.url}`).click(() => {
            pushHistory(view.url);
            changeView(view.url);
        })
    })
}