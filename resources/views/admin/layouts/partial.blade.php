<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Services</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.pages.cms.add-service') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Service Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Service Title"
                                value="{{ old('title') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control" required>{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Select Banner</label>
                            <input type="file" class="form-control" name="banner_image" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Is Active</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Team Member Model -->
<!-- Modal -->
<div class="modal fade" id="teamMemberModel" tabindex="-1" aria-labelledby="teamMemberModelLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="teamMemberModelLabel">Create Member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.pages.cms.add-team-member') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Full Name"
                                    value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Position</label>
                                <input type="text" class="form-control" name="position" placeholder="Enter Position"
                                    value="{{ old('position') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Facebook Link</label>
                                <input type="url" class="form-control" name="facebook_link"
                                    placeholder="Enter Facebook Link" value="{{ old('facebook_link') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Twitter Link</label>
                                <input type="url" class="form-control" name="twitter_link"
                                    placeholder="Enter Twitter Link" value="{{ old('twitter_link') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">LinkedIn Link</label>
                                <input type="url" class="form-control" name="linkedin_link"
                                    placeholder="Enter LinkedIn Link" value="{{ old('linkedin_link') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Instagram Link</label>
                                <input type="url" class="form-control" name="instagram_link"
                                    placeholder="Enter Instagram Link" value="{{ old('instagram_link') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
