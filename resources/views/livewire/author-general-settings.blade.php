<div>
    <form method="POST" wire:submit.prevent='updateGeneralSettings()'>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Profile Name</label>
                    <input type="text" class="form-control" placeholder="Enter Profile Name" wire:model='thread_name'>
                    <span class="text-danger">@error('thread_name'){{ $message }}@enderror</span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Contact Email</label>
                    <input type="text" class="form-control" placeholder="Enter Contact Email" wire:model='thread_email'>
                    <span class="text-danger">@error('thread_email'){{ $message }}@enderror</span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Profile Bio</label>
                    <textarea class="form-control" id="" cols="3" rows="3" wire:model='thread_description'></textarea>
                    <span class="text-danger">@error('thread_description'){{ $message }}@enderror</span>
                </div>
                <button class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </form>
</div>
