const pieChart = document.getElementById("pieChart");
const lineChart = document.getElementById("lineChart");

if (pieChart && lineChart) {
    let pieChartInstance = null;
    let lineChartInstance = null;

    const chart = async () => {
        try {
            const response = await fetch("/api/chart-data");
            const data = await response.json();

            if (pieChartInstance) pieChartInstance.destroy();
            if (lineChartInstance) lineChartInstance.destroy();

            pieChartInstance = new Chart(pieChart, {
                type: "pie",
                data: {
                    labels: ["Admin", "Non-Admin"],
                    datasets: [
                        {
                            label: "Data Petugas",
                            data: [data.jumlah_admin, data.jumlah_nonadmin],
                            backgroundColor: ["#dc3545", "#0d6efd"],
                            hoverOffset: 4,
                        },
                    ],
                },
            });

            lineChartInstance = new Chart(lineChart, {
                type: "line",
                data: {
                    labels: [
                        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                    ],
                    datasets: [
                        {
                            label: "Statistik Stok Barang",
                            data: [65, 59, 80, 81, 56, 55, 40, 55, 40, 55, 40, 50],
                            fill: false,
                            borderColor: "#198754",
                            tension: 0.1,
                        },
                    ],
                },
            });
        } catch (error) {
            // console.error("Terjadi kesalahan:", error);
        }
    };

    chart();

    const intervalId = setInterval(() => {
        if (document.getElementById("pieChart") && document.getElementById("lineChart")) {
            chart();
        } else {
            clearInterval(intervalId);
        }
    }, 30000);
}
