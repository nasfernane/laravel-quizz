// require("./bootstrap");

const showDefinitionBtns = document.querySelectorAll(
    ".quizzContainer__word__btn--show"
);

const nextDefinitionBtns = document.querySelectorAll(
    ".quizzContainer__word__btn--next"
);

// Sprint 2  seif --//
const addDefinitionBtns = document.querySelectorAll(
    ".quizzContainer__word__btn--addDefinition"
);

// formulaire d'ajout d'une définition pendant le quizz
const quizzAddDefinitionForm = document.querySelectorAll(
    ".quizzContainer__word__insert"
);

// Sprint 2 --//
if (showDefinitionBtns) {
    showDefinitionBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            // récupère la définition
            let definition = this.parentNode.parentNode.parentNode
                .childNodes[3];
            let questionMark = this.parentNode.parentNode.parentNode
                .childNodes[5];
            // modifie son affichage
            definition.style.display = "flex";
            questionMark.style.display = "none";
        });
    });
}

if (nextDefinitionBtns) {
    nextDefinitionBtns.forEach((btn) => {
        btn.addEventListener("click", function (e) {
            let word = this.parentNode.parentNode.parentNode;
            let nextWord = word.nextSibling.nextSibling;
            word.style.opacity = 0;
            word.style.zIndex = -1;
            nextWord.style.opacity = 1;
            nextWord.style.zIndex = 99;
        });
    });
}

// Sprint 2 seif --//
if (addDefinitionBtns) {
    addDefinitionBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            // récupère la définition
            let addDefinition = this.parentNode.parentNode.parentNode
                .childNodes[9];
            let questionMark = this.parentNode.parentNode.parentNode
                .childNodes[5];
            // modifie son affichage
            addDefinition.style.display = "flex";
            questionMark.style.display = "none";
        });
    });
}

if (quizzAddDefinitionForm) {
    quizzAddDefinitionForm.forEach((form) => {
        form.addEventListener("submit", function () {
            form.insertAdjacentHTML(
                "beforebegin",
                "<p>Définition correctement ajoutée</p>"
            );
        });
    });
}
