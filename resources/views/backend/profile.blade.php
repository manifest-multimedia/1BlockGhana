<x-backend.app2>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="Agents" class="mb-5"  menu="Agent Profile" />

				<div class="container-fluid mt-5">

					@if (Laravel\Fortify\Features::canUpdateProfileInformation())
							<div class="col-md-12">
									@livewire('profile.update-profile-information-form')
							</div>
					@endif

					@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
							<div class="col-md-12">
									@livewire('profile.update-password-form')
							</div>
					@endif

					@if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
							<div class="col-md-12">
									@livewire('profile.two-factor-authentication-form')
							</div>
					@endif

					<div class="col-md-12">
							@livewire('profile.logout-other-browser-sessions-form')
					</div>

					@if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
							<div class="col-md-12">
									@livewire('profile.delete-user-form')
							</div>
					@endif

			</div>

        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function(e) {


            $('#image').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-before-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

        });
    </script>
</x-backend.app2>
