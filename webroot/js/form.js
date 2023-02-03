$(document).ready(function () {
  $("#form").validate({
    rules: {
      "user_profile[first_name]": {
        required: true,
      },
      "user_profile[last_name]": {
        required: true,
      },
      "user_profile[contact]": {
        required: true,
      },
      "user_profile[address]": {
        required: true,
      },
      password: {
        required: true,
      },
      Confirmpassword: {
        required: true,
      },
      // 'user_profile[profile_image]': {
      //   required: true,
      // },
      email: {
        required: true,
        email: true,
      },
    },
    messages: {
      "user_profile[first_name]": "Please enter your First Name",
      "user_profile[last_name]": "Please enter your Last name",
      "user_profile[contact]": "Please enter your Contact",
      "user_profile[address]": "Please enter your Address",
      password: "Please enter your password",
      Confirmpassword: "Please enter your password",
      // 'user_profile[profile_image]': "Please selsect your profile_image",

      email: {
        required: "Please enter email",
        email: "Please enter vaild email only",
      },
    },
    submitHandler: function (form) {
      form.submit();
    },
  });
});
