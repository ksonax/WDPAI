const search = document.querySelector('input[placeholder="Search"]');
const gameContainer = document.querySelector(".explore_games");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (games) {
            gameContainer.innerHTML = "";
            loadGames(games)
        });
    }
});

function loadGames(games) {
        games.forEach(game => {
            console.log(game);
            createGames(game);
        });
}

function createGames(game) {
        const template = document.querySelector("#game-template");

        const clone = template.content.cloneNode(true);
        const div = clone.querySelector("div");
        div.id = game.id;
        const image = clone.querySelector("img");
        image.src = `/public/img/uploads/${game.image}`;
        const title = clone.querySelector("h3");
        title.innerHTML = game.title;
        const description = clone.querySelector("p");
        description.innerHTML = game.description;
        const online = clone.querySelector(".online");
        online.innerText = game.like;
        const waiting = clone.querySelector(".waiting");
        waiting.innerText = game.dislike;

        gameContainer.appendChild(clone);
}