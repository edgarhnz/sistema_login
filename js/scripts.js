// Listar usuarios
function fetchUsers() {
    fetch('fetch_users.php')
        .then(response => response.json())
        .then(data => renderUsers(data))
        .catch(error => console.error('Error:', error));
}

// Renderizar usuarios en la tabla
function renderUsers(users) {
    const tbody = document.querySelector('#userTable tbody');
    tbody.innerHTML = '';
    users.forEach(user => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${user.id}</td>
            <td>${user.username}</td>
            <td>
                <button onclick="editUser(${user.id})">Editar</button>
                <button onclick="deleteUser(${user.id})">Eliminar</button>
            </td>
        `;
        tbody.appendChild(row);
    });
}

// Crear usuario
function createUser() {
    const username = document.querySelector('#username').value;
    fetch('create_user.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ username }),
    })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            fetchUsers();
        })
        .catch(error => console.error('Error:', error));
}

// Editar usuario
function editUser(id) {
    const newUsername = prompt('Nuevo nombre de usuario:');
    if (newUsername) {
        fetch(`update_user.php`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id, newUsername }),
        })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                fetchUsers();
            })
            .catch(error => console.error('Error:', error));
    }
}

// Eliminar usuario
function deleteUser(id) {
    if (confirm('¿Estás seguro de eliminar este usuario?')) {
        fetch(`delete_user.php`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id }),
        })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                fetchUsers();
            })
            .catch(error => console.error('Error:', error));
    }
}

// Inicializar la tabla al cargar
document.addEventListener('DOMContentLoaded', fetchUsers);
