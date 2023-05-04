@section('add')

    <td>
        <form
            onsubmit=" return confirm('Are u sure u want to delete this role?')"
            method="post"
            action="#">
            @method('delete')
            @csrf
            <button type="submit" class="btn text-red"><i
                    class="fa fa-trash"></i> Delete
            </button>
        </form>
    </td>
    <form>
        <td>
            <input type="text" class="form-control" name="firstname"
                   placeholder="First Name *">
        </td>
        <td>
            <input type="text" class="form-control" name="middlename"
                   placeholder="Middle Name">
        </td>
        <td>
            <input type="text" class="form-control" name="lastname"
                   placeholder="Last Name">
        </td>
        <td>
            <input type="number" class="form-control" name="age"
                   placeholder="Age *">
        </td>
        <td>
            <select class="form-control show-tick" name="gender">
                <option value="">Select Your Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </td>
        <td>
            <input type="checkbox" class="show-address"> Different Address?
        </td>
        <div class="d-none changing">
            <td>
                <select id="country" name="country" class="form-control show-tick">
                    <option>Choose the country</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" name="address"
                       placeholder="Address">
            </td>
            <td>
                <input type="text" class="form-control" name="city"
                       placeholder="City">
            </td>
            <td>
                <input type="text" class="form-control" name="state"
                       placeholder="State">
            </td>
            <td>
                <input type="number" class="form-control" name="zipcode"
                       placeholder="ZipCode">
            </td>
        </div>
        <td>
            <button type="submit" class="btn btn-lg bg-success w-">Save User
            </button>
        </td>
    </form>

@endsection
