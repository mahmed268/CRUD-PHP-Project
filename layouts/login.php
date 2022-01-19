            <!-- Click on Modal Button -->

            <div>

                <button type="button" class="btn btn-success mx-auto
                        d-block " data-bs-toggle="modal" data-bs-target="#modalForm2">
                    Log in
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modalForm2" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Log in Here</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Email
                                            Address</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="Username" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Password" />
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="rememberMe" />
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="modal-footer d-block">
                                        <button type="submit" class="btn
                                                btn-warning float-end">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>