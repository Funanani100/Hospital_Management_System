function switchTab(tab) {
    const heading = document.getElementById("form-heading");
    const container = document.getElementById("formContainer");
    const tabs = document.querySelectorAll(".tabs button");
  
    // Remove active state from all tabs
    tabs.forEach((tabButton) => {
      tabButton.classList.remove("active");
    });
  
    // Set the form content based on the selected tab
    if (tab === "patient") {
      heading.textContent = "Register as Patient";
      container.innerHTML = `
        <form id="patientForm" method="POST" action="signUp.php">
            <input type="text" name="first_name" placeholder="First Name *" required>
            <input type="text" name="last_name" placeholder="Last Name *" required>
            <input type="email" name="email" placeholder="Your Email *" required>
            <input type="tel" name="phone" placeholder="Your Phone *" required>
            <input type="password" name="password" placeholder="Password *" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password *" required>
            <div class="gender">
                <label><input type="radio" name="gender" value="male" required> Male</label>
                <label><input type="radio" name="gender" value="female" required> Female</label>
            </div>
            <div class="form-footer">
                <a href="#">Already have an account?</a>
                <button type="submit">Register</button>
            </div>
        </form>
      `;
    } else if (tab === "doctor") {
      heading.textContent = "Login as Doctor";
      container.innerHTML = `
        <form id="doctorForm" method="POST" action="doctorLogin.php">
            <input type="text" name="username" placeholder="Username *" required>
            <input type="password" name="password" placeholder="Password *" required>
            <div class="form-footer">
                <a href="#">Forgot password?</a>
                <button type="submit">Login</button>
            </div>
        </form>
      `;
    } else if (tab === "receptionist") {
      heading.textContent = "Login as Admin";
      container.innerHTML = `
        <form id="receptionistForm" method="POST" action="adminLogin.php">
            <input type="text" name="username" placeholder="Username *" required>
            <input type="password" name="password" placeholder="Password *" required>
            <div class="form-footer">
                <a href="#">Forgot password?</a>
                <button type="submit">Login</button>
            </div>
        </form>
      `;
    }
  
    // Add the active class to the current tab's button using its data-tab attribute
    document.querySelector(`[data-tab="${tab}"]`).classList.add("active");
  }
  