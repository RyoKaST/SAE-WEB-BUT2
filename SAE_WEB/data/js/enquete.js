document.addEventListener("DOMContentLoaded", () => {
    const chartsContainer = d3.select("#charts");

    Data.forEach((questionData, index) => {
        const NbQuestion = index + 1; //Pour avoir le numero de question
        const isTable = [1, 2].includes(NbQuestion); //Verifie si l'indice de la q est 1 ou 2 car ces questions sont des tableaux

        //On ajoute une nouvelle div pour la question (conteneur)
        const section = chartsContainer
            .append("div")
            .attr("class", "question-section my-5");
        //On ecris le numero et la question en h2
        section
            .append("h2")
            .text(`${NbQuestion}. ${questionData.question}`);

        if (isTable) {
            createTable(section, questionData.reponse);
        } else {
            createPieChart(section, questionData.reponse);
        }
    });

    // Fonction pour créer un tableau
    function createTable(section, data) {
        const table = section.append("table").attr("class", "table table-striped");

        // En-tête du tableau
        const thead = table.append("thead"); //thead pour les titres des colonnes
        thead.append("tr")
            .selectAll("th")
            .data(["Réponse", "Nombre", "Pourcentage"]) // Associe les titres de colonne aux cellules de l'en-tête
            .join("th")
            .text((d) => d);

        // Corps du tableau
        const tbody = table.append("tbody"); // Ajoute un élément <tbody> pour contenir les lignes de réponses
        tbody.selectAll("tr")
            .data(data) // Associe chaque élément de "data" (les réponses) à une ligne
            .join("tr") //on creer une ligne pour chaque reponse
            .selectAll("td")
            .data((d) => [d.libelle_reponse, d.nombre_reponses, `${d.pourcentage_reponses}%`]) // associe les données
            .join("td")
            .text((d) => d); //rempli le texte de chaque cellule avec la donnée correspondante
    }

    // Fonction pour créer un graphique en camembert
    function createPieChart(section, data) {
        const width = 400;
        const height = 400;
        const radius = Math.min(width, height) / 2;

        const svg = section
            .append("svg")
            .attr("class", "pie-chart-svg") //classe css pour le style
            .attr("width", width)
            .attr("height", height)
            .style("margin", "0 auto")  // Centre le SVG horizontalement
            .append("g") // Ajoute un élément de groupe (g) pour centraliser et ajouter les arcs à l'intérieur de l'élément <svg>
            .attr("transform", `translate(${width / 2}, ${height / 2})`); //l'origine du graphique devient le centre du svg

        // couleurs du camembert
        const color = d3.scaleOrdinal([
            "#212E53",
            "#4A919E",
            "#BED3C3",
        ]);

        //Permet de créer des arcs à partir des données (donne des angles)
        const pie = d3.pie().value((d) => d.nombre_reponses);
        //Definit le rayon des arcs
        const arc = d3.arc().innerRadius(0).outerRadius(radius);

        //créer les arcs
        const arcs = svg
            .selectAll(".arc")
            .data(pie(data)) // Lie les données aux arcs (chaque element de data créer un arcs)
            .join("g")
            .attr("class", "arc"); // Applique la classe "arc" à chaque élément du groupe

        arcs.append("path")
            .attr("d", arc)
            .attr("fill", (d) => color(d.data.libelle_reponse)); //Attribue une couleur à l'arc en fonction de la réponse

        //Ajout du texte dans les arcs du camemebert
        arcs.append("text")
            .attr("transform", (d) => `translate(${arc.centroid(d)})`) //Calcul pour placer le txt au centre
            .attr("text-anchor", "middle")
            .text((d) => `${d.data.libelle_reponse} (${d.data.pourcentage_reponses}%)`); //Affiche la reponse et le pourcentage
    }
});