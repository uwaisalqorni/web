    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center mt-5 pt-lg-5">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-lg-5 p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
							<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center mb-4">
										<h1 class="h4 text-gray-900">RSI MyAdmin</h1>
										<span class="text-muted">Login</span>
									</div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <form class="user" action="<?= base_url('auth'); ?>" method="post">
                                        <div class="form-group">
                                            <input autofocus="autofocus" autocomplete="off" type="text" class="form-control form-control-user" id="username" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
                                            <?= form_error(
                                                'username',
                                                '<small class="text-danger pl-3">',
                                                '</small>'
                                            ); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                            <?= form_error(
                                                'password',
                                                '<small class="text-danger pl-3">',
                                                '</small>'
                                            ); ?>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>