// Mock data for patients and doctors
const patients = [
    { name: "Emerly ", age: 37, condition: "Fever", room: 157 },
    { name: "Gloria", age: 51, condition: "Lung Cancer", room: 219 },
];

const doctors = [
    { name: "Dr. Tshabalala", type: "Dentist" },
    { name: "Dr. VanRoben", type: "Surgeon" },
    { name: "Dr. Smith", type: "Cardiologist" },
];

// Populate recent patients
const recentPatientsTable = document.getElementById("recentPatients");
patients.forEach((patient) => {
    const row = document.createElement("tr");
    row.innerHTML = `
        <td>${patient.name}</td>
        <td>${patient.age}</td>
        <td>${patient.condition}</td>
        <td>${patient.room}</td>
    `;
    recentPatientsTable.appendChild(row);
});

// Populate doctor list
const doctorList = document.getElementById("doctorList");
doctors.forEach((doctor) => {
    const item = document.createElement("li");
    item.textContent = `${doctor.name} (${doctor.type})`;
    doctorList.appendChild(item);
});

// Render patient statistics chart
const ctx = document.getElementById("patientChart").getContext("2d");
new Chart(ctx, {
    type: "line",
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
        datasets: [{
            label: "Patients",
            data: [200, 300, 400, 350, 450, 500],
            backgroundColor: "rgba(102, 51, 153, 0.2)",
            borderColor: "rgba(102, 51, 153, 1)",
            borderWidth: 2,
        }],
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false },
        },
    },
});
