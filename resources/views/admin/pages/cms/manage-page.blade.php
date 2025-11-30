@extends('admin.layouts.app')

@section('main-container')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Manage Page</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Page Setting</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">About Page Setting</h4>
                        <form action="{{ route('admin.pages.cms.update-page') }}" class="manage-top-header" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- ===== General About Section ===== -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">About Title</label>
                                    <input type="text" name="title" value="{{ $about->title ?? '' }}"
                                        class="form-control" placeholder="Enter About Title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">About Image 1</label>
                                    @if ($about->image_1 ?? false)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $about->image_1) }}" width="150"
                                                class="img-thumbnail">
                                        </div>
                                    @endif
                                    <input type="file" name="image_1" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">About Image 2</label>
                                    @if ($about->image_2 ?? false)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $about->image_2) }}" width="150"
                                                class="img-thumbnail">
                                        </div>
                                    @endif
                                    <input type="file" name="image_2" class="form-control">
                                </div>

                                <div class="col-md-12 mb-4">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" id="description" rows="8" class="form-control">{{ $about->description ?? old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- ===== Dynamic About Cart Section ===== -->
                                <h4 class="mt-5">
                                    About Cart Items
                                    <button type="button" class="btn btn-sm btn-success float-end" id="add-cart-item">
                                        <i class="mdi mdi-plus"></i> Add Item
                                    </button>
                                </h4>
                            </div>
                            <div id="cart-items-container">
                                {{-- If you already have existing cart items (from DB), loop them here --}}
                                @if (isset($about->aboutCarts) && $about->aboutCarts->count())
                                    @foreach ($about->aboutCarts as $index => $cart)
                                        <div class="cart-item row align-items-end mb-4 border p-3 rounded">
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label">Cart Title</label>
                                                <input type="text" name="cart_items[{{ $index }}][title]"
                                                    value="{{ $cart->title }}" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Cart Description</label>
                                                <textarea name="cart_items[{{ $index }}][description]" class="form-control" rows="3">{{ $cart->description }}</textarea>
                                            </div>
                                            <div class="col-md-1 mb-3">
                                                <button type="button" class="btn btn-danger btn-sm remove-cart-item">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    {{-- Default empty row --}}
                                    <div class="cart-item row align-items-end mb-4 border p-3 rounded">
                                        <div class="col-md-5 mb-3">
                                            <label class="form-label">Cart Title</label>
                                            <input type="text" name="cart_items[0][title]" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Cart Description</label>
                                            <textarea name="cart_items[0][description]" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-1 mb-3">
                                            <button type="button" class="btn btn-danger btn-sm remove-cart-item">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service Pages -->
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h4>
                                Services
                                <button type="button" class="btn btn-sm btn-success float-end" id="add-cart-item"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="mdi mdi-plus"></i> Add Service
                                </button>
                            </h4>
                        </div>
                        <table id="table" class="table table-striped table-bordered table-white">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Banner</th>
                                    <th>Title</th>
                                    <th>Descriptions</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($services))
                                    @foreach ($services as $index => $service)
                                        <tr>
                                            <td>{{ $index + 1 }}.</td>
                                            <td>
                                                @if (!empty($service->banner_image))
                                                    <img src="{{ asset('public/storage/' . $service->banner_image) }}"
                                                        alt="{{ $service->title }}">
                                                @endif
                                            </td>
                                            <td>{{ $service->title ?? 'Not Available' }}</td>
                                            <td>{{ $service->description ?? 'Not Available' }}</td>
                                            <td>
                                                <a href="{{ route('admin.pages.cms.service-status-change', Crypt::encrypt($service->id)) }}"
                                                    class="badge rounded-pill text-bg-{{ $service->is_active ? 'success' : 'warning' }}">{{ $service->is_active ? 'Active' : 'Inactive' }}</a>
                                            </td>
                                            <td>{{ $service->created_at->format('d/m/Y h:i:s A') }}</td>
                                            <td>
                                                <a href="{{ route('admin.pages.cms.view-service', Crypt::encrypt($service->id)) }}"
                                                    class="btn btn-sm btn-primary">View</a>
                                                <button class="btn btn-sm btn-success">Edit</button>
                                                <a href="{{ route('admin.pages.cms.delete-service', Crypt::encrypt($service->id)) }}"
                                                    class="btn btn-sm btn-danger delete-btn">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Page -->
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="cart-title">Contact Page Setting</div>
                        <form action="{{ route('admin.pages.cms.contact-setting') }}" method="POST">
                            @csrf
                            <div class="row mt-4">
                                <div class="col-md-6 mt-4">
                                    <label for="" class="form-label">Contact Title</label><span
                                        class="text-danger">*</span>
                                    <input type="text" name="contact_title" id="contact_title" class="form-control"
                                        value="{{ old('contact_title', $contact->contact_title ?? '') }}">
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label for="" class="form-label">Contact Description</label><span
                                        class="text-danger">*</span>
                                    <input type="text" name="contact_description" id="contact_description"
                                        class="form-control"
                                        value="{{ old('contact_description', $contact->contact_title ?? '') }}">
                                </div>
                                <div class="col-md-4 mt-4">
                                    <lable class="form-lable">Address</lable><span class="text-danger">*</span>
                                    <input type="text" name="address" id="address"
                                        value="{{ old('address', $contact->address ?? '') }}" class="form-control">
                                </div>
                                <div class="col-md-4 mt-4">
                                    <lable class="form-lable">Eamil</lable><span class="text-danger">*</span>
                                    <input type="email" name="email" id="email"
                                        value="{{ old('email', $contact->email ?? '') }}" class="form-control">
                                </div>
                                <div class="col-md-4 mt-4">
                                    <lable class="form-lable">Phone Number</lable><span class="text-danger">*</span>
                                    <input type="text" name="phone_number" id="phone_number"
                                        value="{{ old('phone_number', $contact->phone_number ?? '') }}"
                                        class="form-control">
                                </div>
                                <div class="col-md-12 mt-4">
                                    <lable class="form-lable">Map Link</lable><span class="text-danger">*</span>
                                    <textarea name="map_link" id="map_link" cols="30" rows="10" class="form-control">{{ old('map_link', $contact->map_link ?? '') }}</textarea>
                                </div>
                            </div>
                            <button style="float: right;" class="btn btn-primary mt-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        let cartIndex = {{ isset($aboutCarts) ? $aboutCarts->count() : 1 }};

        $('#add-cart-item').on('click', function() {
            const template = `
            <div class="cart-item row align-items-end mb-4 border p-3 rounded">
                <div class="col-md-5 mb-3">
                    <label class="form-label">Cart Title</label>
                    <input type="text" name="cart_items[${cartIndex}][title]" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Cart Description</label>
                    <textarea name="cart_items[${cartIndex}][description]" class="form-control" rows="3"></textarea>
                </div>
                <div class="col-md-1 mb-3">
                    <button type="button" class="btn btn-danger btn-sm remove-cart-item">
                        <i class="mdi mdi-delete"></i>
                    </button>
                </div>
            </div>`;
            $('#cart-items-container').append(template);
            cartIndex++;
        });

        // Remove cart item
        $(document).on('click', '.remove-cart-item', function() {
            $(this).closest('.cart-item').remove();
        });
    </script>
@endsection
