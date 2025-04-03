const itemLogsTables = document.getElementById("itemLogsTable");

const itemLogs = async () => {
    try {
        const response = await fetch("/api/item-logs");
        const data = await response.json();

        itemLogsTables.innerHTML = "";
        data.activities.forEach((itemLog) => {
            const row = document.createElement("tr");
            row.innerHTML = `
                    <td class="text-center">${itemLog.id}</td>
                    <td>${itemLog.description}</td>
                `;
            itemLogsTables.appendChild(row);
        });
    } catch (error) {
        // console.error(error);
    }
};

itemLogs();

setInterval(() => {
    itemLogs();
}, 5000);
