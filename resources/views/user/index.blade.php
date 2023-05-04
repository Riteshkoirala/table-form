@extends('Layout.layout')
@section('content')
    <div class="section-body mt-5">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <div class="header-action float-right">

                    <a class="btn btn-primary btn-lg text-white"
                       id="newuser">+
                        Users</a>

                    @if(Session::has('success'))
                        <p>
                            <script>alert('{{ Session::get('success') }}')</script>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="section-body mt-3">
        <div class="container-fluid">
            <div class="tab-content mt-3">
                <div class="tab-pane fade show active">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-vcenter table-hover mb-0 text-nowrap">
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <form
                                                    onsubmit=" return confirm('Are u sure u want to delete this user?')"
                                                    method="post"
                                                    action="{{ route('users.destroy', $user) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn text-red"><i
                                                            class="fa fa-trash text-danger fs-4"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <form action="{{ route('users.update', $user) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <td>
                                                    <input type="text" class="form-control" style="width: 150px"
                                                           name="firstname"
                                                           placeholder="First Name *" value="{{ $user->firstname }}">

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" style="width: 150px"
                                                           name="middlename"
                                                           placeholder="Middle Name" value="{{ $user->middlename  }}">

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" style="width: 150px"
                                                           name="lastname"
                                                           placeholder="Last Name" value="{{ $user->lastname }}">

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" style="width: 100px"
                                                           name="age"
                                                           placeholder="Age *" value="{{ $user->age }}">

                                                </td>
                                                <td>
                                                    <select class="form-control show-tick" style="width: 150px"
                                                            name="gender">
                                                        <option value="{{ $user->gender }}">{{ $user->gender }}</option>
                                                        <option value="">Select Your Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="my_checkbox" class="show-address-checkbox"
                                                           id="show-address" value="1" {{ old('my_checkbox') == '1' ? 'checked' : '' }}> Different Address?
                                                </td>
                                                <td class="invisible-column">
                                                    <select id="country" name="country"
                                                            class="form-control show-tick country" style="width: 150px">
                                                        <option
                                                            value="{{ $user->country }}">{{ $user->country }}</option>
                                                        <option>Choose the country</option>
                                                    </select>
                                                </td>
                                                <td class="invisible-column">

                                                    <input type="text" class="form-control" style="width: 150px"
                                                           name="address"
                                                           placeholder="Address" value="{{ $user->address }}">

                                                </td>
                                                <td class="invisible-column">

                                                    <input type="text" class="form-control" style="width: 150px"
                                                           name="city"
                                                           placeholder="City" value="{{ $user->city }}">

                                                </td>
                                                <td class="invisible-column">
                                                    <input type="text" class="form-control" style="width: 150px"
                                                           name="state"
                                                           placeholder="State" value="{{ $user->state }}">

                                                </td>
                                                <td class="invisible-column">
                                                    <input type="number" class="form-control" style="width: 150px"
                                                           name="zipcode"
                                                           placeholder="ZipCode" value="{{ $user->zipcode }}">
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn bg-success text-white">Update
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                    <livewire:new-form/>
                                    <tr>
                                        <td></td>
                                        <td>
                                            @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror
                                        </td>
                                        <td>
                                            @error('middlename') <span class="text-danger">{{ $message }}</span> @enderror
                                        </td>
                                        <td>
                                            @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
                                        </td>
                                        <td>
                                            @error('age') <span class="text-danger">{{ $message }}</span> @enderror
                                        </td>
                                        <td>
                                            @error('gender') <span class="text-danger">{{ $message }}</span> @enderror

                                        </td>
                                        <td>

                                        </td>
                                        <td>
                                            @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                                        </td>
                                        <td>
                                            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                        </td>
                                        <td>
                                            @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                        </td>
                                        <td>
                                            @error('state') <span class="text-danger">{{ $message }}</span> @enderror

                                        </td>
                                        <td>
                                            @error('zipcode') <span class="text-danger">{{ $message }}</span> @enderror
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.invisible-column').hide();
        $('.row-invisible').hide();
        let clickCount = 0;
        let newRow = document.getElementById('newrow');

        let myData = localStorage.getItem('clicked');


        if (myData == 'addRow') {
            clickCount = 1;
            newRow.classList.remove('d-none');
        }
        $('#newuser').on('click', () => {
            if (clickCount >= 1) {
                alert('fill the one created first');
            } else {
                clickCount++;
                newRow.classList.remove('d-none');
                localStorage.setItem('clicked', 'addRow')
            }
        })

        $('#clear').on('click', () => {
            newRow.classList.add('d-none');
            localStorage.removeItem('clicked');
            clickCount = 0;
            location.reload();
        })

        $('.show-address-checkbox').on('change', function () {
            let isChecked = $(this).is(':checked');
            let row = $(this).closest('tr');
            let location = row.find('.invisible-column');

            if (isChecked) {
                location.show();
            } else {
                location.hide();
            }
        });
        $('#row-address').on('change', function () {
            let isChecked = $(this).is(':checked');
            let row = $(this).closest('tr');
            let location = row.find('.row-invisible');

            if (isChecked) {
                location.show();
            } else {
                location.hide();
            }
        });
        // Make an AJAX request to retrieve the list of countries from the REST Countries API
        $.ajax({
            url: "https://restcountries.com/v3.1/all",
            method: "GET",
            success: function (response) {
                // Find all <select> elements with the class "countryDropdown" in the HTML
                var selectElements = document.getElementsByClassName("country");
                // Dynamically create an <option> element for each country in the response
                for (var j = 0; j < selectElements.length; j++) {
                    for (var i = 0; i < response.length; i++) {
                        var optionElement = document.createElement("option");
                        optionElement.value = response[i].name.common;
                        optionElement.textContent = response[i].name.common;
                        selectElements[j].appendChild(optionElement);
                    }
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });

    </script>
@endsection
