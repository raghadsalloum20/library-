function submitForm() {
  var firstName = document.getElementById("first-name").value;
  var lastName = document.getElementById("last-name").value;
  var subject = document.getElementById("subject").value;
  var message = document.getElementById("message").value;

  if(firstName == "" || lastName == "" || subject == "" || message == ""){
    document.getElementById("error").insertAdjacentHTML("beforeend", "<p style='color: red;'>You should fill all fields.</p>");
  }
  else{
    alert("Thanks for contacting us!");
    // Add form validation and error handling here
    // Send the form data to the server-side script
    // and send a response to the user
  }

  // Add event listener to the button
  const button = document.getElementById("submit-button");
  button.addEventListener("click", function() {
    document.getElementById("error").innerHTML = "";
  });
}