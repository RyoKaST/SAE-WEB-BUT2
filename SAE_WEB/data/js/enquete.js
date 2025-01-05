document.addEventListener("DOMContentLoaded", () => {
    const chartsContainer = d3.select("#charts");

    Data.forEach((questionData, index) => {
        const NbQuestion = index + 1;
        const isTable = [1, 2].includes(NbQuestion);

        const section = chartsContainer
            .append("div")
            .attr("class", "question-section my-5");

        section
            .append("h2")
            .text(`${NbQuestion}. ${questionData.question}`);

        if (questionData.responses.length > 0) {
            if (isTable) {
                createTable(section, questionData.responses);
            } else {
                createPieChart(section, questionData.responses);
            }
        }
    });

    // Fonction pour créer un tableau
    function createTable(section, data) {
        const table = section.append("table").attr("class", "table table-striped");

        // En-tête
        const thead = table.append("thead");
        thead.append("tr")
            .selectAll("th")
            .data(["Réponse", "Nombre", "Pourcentage"])
            .join("th")
            .text((d) => d);

        // Corps du tableau
        const tbody = table.append("tbody");
        tbody.selectAll("tr")
            .data(data)
            .join("tr")
            .selectAll("td")
            .data((d) => [d.libelle_reponse, d.nombre_reponses, `${d.pourcentage_reponses}%`])
            .join("td")
            .text((d) => d);
    }

    // Fonction pour créer un graphique en camembert
    function createPieChart(section, data) {
        const width = 400;
        const height = 400;
        const radius = Math.min(width, height) / 2;

        const svg = section
            .append("svg")
            .attr("class", "pie-chart-svg")
            .attr("width", width)
            .attr("height", height)
            .style("margin", "0 auto")  // Centre le SVG horizontalement
            .append("g")
            .attr("transform", `translate(${width / 2}, ${height / 2})`);



        // Ajout de belles couleurs modernes pour le camembert
        const color = d3.scaleOrdinal([
            "#212E53",
            "#4A919E",
            "#BED3C3",
        ]);


        const pie = d3.pie().value((d) => d.nombre_reponses);

        const arc = d3.arc().innerRadius(0).outerRadius(radius);

        const arcs = svg
            .selectAll(".arc")
            .data(pie(data))
            .join("g")
            .attr("class", "arc");

        arcs.append("path")
            .attr("d", arc)
            .attr("fill", (d) => color(d.data.libelle_reponse));

        arcs.append("text")
            .attr("transform", (d) => `translate(${arc.centroid(d)})`)
            .attr("text-anchor", "middle")
            .text((d) => `${d.data.libelle_reponse} (${d.data.pourcentage_reponses}%)`);
    }
});
