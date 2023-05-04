<tr class="d-none" id="newrow">
    <td>
        <button id="clear" type="submit" class="btn text-red"><i class="fa fa-trash text-danger fs-4"></i></button>
    </td>
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <td>
            <input type="text" class="form-control" name="firstname" placeholder="First Name *" value="{{old('firstname')}}">
            @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror
        </td>
        <td>
            <input type="text" class="form-control" name="middlename" placeholder="Middle Name" value="{{old('middlename')}}">
            @error('middlename') <span class="text-danger">{{ $message }}</span> @enderror
        </td>
        <td>
            <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="{{old('lastname')}}">
            @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
        </td>
        <td>
            <input type="number" class="form-control" name="age" placeholder="Age *" value="{{old('age')}}">
            @error('age') <span class="text-danger">{{ $message }}</span> @enderror
        </td>
        <td>
            <select class="form-control show-tick" name="gender" >
                <option value="">Select Your Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
        </td>
        <td>
            <input type="checkbox" id="row-address" wire:model.lazy="hasDifferentAddress"> Different Address?
        </td>
        <td class="row-invisible">
            <select id="country" name="country" class="form-control show-tick country" style="width: 150px">
                <option>Choose the country</option>
            </select>
            @error('country') <span class="text-danger">{{ $message }}</span> @enderror

        </td>
        <td class="row-invisible">
            <input type="text" class="form-control" style="width: 150px" name="address" placeholder="Address" value="{{old('address')}}">
            @error('address') <span class="text-danger">{{ $message }}</span> @enderror

        </td>
        <td class="row-invisible">
            <input type="text" class="form-control" style="width: 150px" name="city" placeholder="City" value="{{old('city')}}">
            @error('city') <span class="text-danger">{{ $message }}</span> @enderror
        </td>
        <td class="row-invisible">
            <input type="text" class="form-control" style="width: 150px" name="state" placeholder="State" value="{{old('state')}}">
            @error('stste') <span class="text-danger">{{ $message }}</span> @enderror

        </td>
        <td class="row-invisible">
            <input type="number" class="form-control" style="width: 150px" name="zipcode" placeholder="ZipCode" value="{{old('zipcode')}}">
            @error('zipcode') <span class="text-danger">{{ $message }}</span> @enderror

        </td>
        <td>
            <button type="submit" id="submit-btn" class="btn bg-success text-white">Save User</button>
        </td>
    </form>
</tr>
