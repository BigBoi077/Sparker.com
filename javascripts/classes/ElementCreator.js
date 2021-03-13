import {getAccordingElement, getAllElements, getSingleElement} from "../helpers/elementGetter.js";
import {getOptionDiv} from "../helpers/constants.js";
import {getNbrPolls} from "../helpers/ajax.js";

export default class ElementCreator {

    createNewInputField(app) {
        const inputFields = getSingleElement("input-fields");
        inputFields.append(this.getInputFieldNode(app.optionIndex));
        app.incrementOptionIndex();

        const deleteButtons = getAllElements("remove-button");
        for (let i =0; i < deleteButtons.length; i++) {
            const button = deleteButtons[i];
            button.addEventListener("click", function () {
                const optionTarget = button.getAttribute("data-option-target");
                const wantedDeletedElement = getAccordingElement("data-option-div", optionTarget);
                wantedDeletedElement.parentNode.removeChild(wantedDeletedElement);
                app.decrementOptionIndex();
            })
        }
    }

    getInputFieldNode(optionNumber) {
        const div = document.createElement("div");
        div.classList.add("field");
        div.setAttribute("data-option-div", `option-${optionNumber}`);
        div.innerHTML = getOptionDiv(optionNumber);
        return div;
    }

    createGraphs() {
        const container = getSingleElement('graph-container');
        const nbrPoll = getNbrPolls();


        google.charts.load('current', {'packages':['corechart']});

        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                ['Mushrooms', 3],
                ['Onions', 1],
                ['Olives', 1],
                ['Zucchini', 1],
                ['Pepperoni', 2]
            ]);

            var options = {'title':'How Much Pizza I Ate Last Night',
                'width':400,
                'height':300};

            var chart = new google.visualization.PieChart(document.getElementById('graph-container'));
            chart.draw(data, options);
            var chart = new google.visualization.PieChart(document.getElementById('graph-container'));
            chart.draw(data, options)
        }

    }
}