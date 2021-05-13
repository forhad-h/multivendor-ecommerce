<form action="">
    <div id="forgotPassword" style="display: none; opacity: 0;" data-target-group="idForm">
        <header class="text-center mb-7">
            <h2 class="h4 mb-0">Recover Password.</h2>
            <p>Enter your email address and an email with instructions will be sent to you.</p>
        </header>

        <div class="form-group">
            <div class="js-form-message js-focus-state">
                <label class="sr-only" for="recoverEmail">Your email</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="recoverEmailLabel">
                            <span class="fas fa-user"></span>
                        </span>
                    </div>
                    <input type="email" class="form-control" name="email" id="recoverEmail"
                           placeholder="Your email" aria-label="Your email"
                           aria-describedby="recoverEmailLabel" required
                           data-msg="Please enter a valid email address."
                           data-error-class="u-has-error"
                           data-success-class="u-has-success">
                </div>
            </div>
        </div>

        <div class="mb-2">
            <button type="submit" class="btn btn-block btn-sm btn-primary transition-3d-hover">
                Recover Password
            </button>
        </div>

        <div class="text-center mb-4">
            <span class="small text-muted">Remember your password?</span>
            <a class="js-animation-link small" href=""
               data-target="#login"
               data-link-group="idForm"
               data-animation-in="slideInUp">Login
            </a>
        </div>
    </div>
</form>
