<section class="container">
    <div class="row mt-2">
        <div class="col-md-6 mx-auto pt-3 border border-success bg-light text-dark">
            <div class="text-center">
                <img src="<?= base_url('assets/img/light.png') ?>"
                     width="100px"
                     alt="sManager Technology" />
                <h3>Your Information</h3>
            </div>

            <?php if (isset($exception)): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $exception ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('payment'); ?>" method="POST">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label><span class="text-danger">*</span>
                    <input type="text"
                           class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                           aria-describedby="nameHelpBlock"
                           value="<?= set_value('name') ?>"
                           name="name"
                           id="name">
                    <?php if (isset($errors['name'])): ?>
                        <small id="nameHelpBlock" class="form-text text-danger">
                            <?= $errors['name'] ?>
                        </small>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="mb-3 col-md">
                        <label for="phone" class="form-label">Contact No.</label><span class="text-danger">*</span>
                        <input type="text"
                               class="form-control <?= isset($errors['phone']) ? 'is-invalid' : '' ?>"
                               aria-describedby="phoneHelpBlock"
                               value="<?= set_value('phone') ?>"
                               name="phone"
                               id="phone">
                        <?php if (isset($errors['phone'])): ?>
                            <small id="phoneHelpBlock" class="form-text text-danger">
                                <?= $errors['phone'] ?>
                            </small>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3 col-md">
                        <label for="email" class="form-label">Email</label>
                        <input type="email"
                               class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                               aria-describedby="emailHelpBlock"
                               value="<?= set_value('email') ?>"
                               name="email"
                               id="email">
                        <?php if (isset($errors['email'])): ?>
                            <small id="emailHelpBlock" class="form-text text-danger">
                                <?= $errors['email'] ?>
                            </small>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control <?= isset($errors['address']) ? 'is-invalid' : '' ?>"
                              id="address"
                              name="address"
                              aria-describedby="addressHelpBlock"
                              rows="2"><?= set_value('address') ?></textarea>
                    <?php if (isset($errors['address'])): ?>
                        <small id="addressHelpBlock" class="form-text text-danger">
                            <?= $errors['address'] ?>
                        </small>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label><span class="text-danger">*</span>
                    <input type="text"
                           class="form-control <?= isset($errors['amount']) ? 'is-invalid' : '' ?>"
                           aria-describedby="amountHelpBlock"
                           value="<?= set_value('amount') ?>"
                           name="amount"
                           id="amount">
                    <?php if (isset($errors['amount'])): ?>
                        <small id="amountHelpBlock" class="form-text text-danger">
                            <?= $errors['amount'] ?>
                        </small>
                    <?php endif; ?>
                </div>
                <div class="float-end mb-2">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
