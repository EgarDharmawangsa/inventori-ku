const activeUsersTable = document.getElementById("activeUsersTable");

if (activeUsersTable) {
    const activeUsers = async () => {
        try {
            const response = await fetch("/api/active-users");
            const data = await response.json();

            activeUsersTable.innerHTML = "";
            data.petugass_aktif.forEach((user) => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td class="text-center">${user.id}</td>
                    <td>${user.name}</td>
                    <td class="text-center">${
                        user.role_id == 1 ? "Admin" : "Non-Admin"
                    }</td>
                `;
                activeUsersTable.appendChild(row);
            });
        } catch (error) {
            // console.error(error);
        }
    };

    activeUsers();

    const intervalId = setInterval(() => {
        if (document.getElementById("activeUsersTable")) {
            activeUsers();
        } else {
            clearInterval(intervalId);
        }
    }, 5000);
}
