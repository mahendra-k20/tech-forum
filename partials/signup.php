<div
  class="modal fade"
  id="signup"
  data-bs-backdrop="static"
  data-bs-keyboard="false"
  tabindex="-1"
  aria-labelledby="staticBackdropLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5" id="staticBackdropLabel">
          Signup to iDiscuss
        </h2>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/tech-forum/partials/_handlesignup.php">
          <div class="mb-3">
            <label for="username" class="form-label"
              >Full name</label
            >
            <input
              type="text"
              class="form-control"
              id="username"
              name="username"
              aria-describedby="username"
            />
          </div>
          <div class="mb-3">
            <label for="useremail" class="form-label"
              >Email address</label
            >
            <input
              type="email"
              class="form-control"
              id="useremail"
              name="useremail"
              aria-describedby="emailHelp"
            />
            <div id="emailHelp" class="form-text">
              We'll never share your email with anyone else.
            </div>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label"
              >Password</label
            >
            <input
              type="password"
              class="form-control"
              id="password"
              name="password"
            />
          </div>
          <div class="mb-3">
            <label for="cpassword" class="form-label"
              >Confirm Password</label
            >
            <input
              type="password"
              class="form-control"
              id="cpassword"
              name="cpassword"
            />
          </div>
          <button type="submit" class="btn btn-success">Signup</button>
        </form>
      </div>
    </div>
  </div>
</div>
