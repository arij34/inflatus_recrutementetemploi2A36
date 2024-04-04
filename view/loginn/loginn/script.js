const signUpForm = document.querySelector('.form-wrapper.sign-up form');

signUpForm.addEventListener('submit', (event) => {
    event.preventDefault(); // Prevent default form submission
    const radioButtonEtudiant = document.querySelector('input[value="option1"]');
    const radioButtonAdmin = document.querySelector('input[value="option3"]');

    if (radioButtonEtudiant.checked) {
        window.location.href = 'etudiant.html'; // Redirect to etudiant.html when "etudiant" is selected
    } else if (radioButtonAdmin.checked) {
        window.location.href = 'admin.html'; // Redirect to admin.html when "admin" is selected
    }
});
