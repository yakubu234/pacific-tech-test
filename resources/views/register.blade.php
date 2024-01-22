<!DOCTYPE html>
<head>
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>



<div class="formbold-main-wrapper">

  <div class="formbold-form-wrapper">
    <form method="POST" action="{{ URL('register') }}" enctype="multipart/form-data">
      <div class="formbold-mb-5">
        <label for="email" class="formbold-form-label">
          Email:
        </label>
        <input
          type="email" placeholder="Enter your email"
          class="formbold-form-input" 
          name="email" id="email" value="{{ old('email') }}" required /><br>
    @error('email')
        <span class="error">{{ $message }}</span>
    @enderror
      </div>

      <div class="formbold-mb-5">
        <label for="name" class="formbold-form-label">
          Full Name:
        </label>
        <input
          type="text" placeholder="Enter your name"
          class="formbold-form-input" 
          name="name" id="name" value="{{ old('name') }}" required /><br>
    @error('name')
        <span class="error">{{ $message }}</span>
    @enderror
      </div>

      <div class="formbold-mb-5">
        <label for="password" class="formbold-form-label">
          Password: Min 6 characters
        </label>
        <input
          type="password" placeholder="Enter your password"
          class="formbold-form-input" 
          name="password" id="password" value="{{ old('password') }}" required /><br>
    @error('password')
        <span class="error">{{ $message }}</span>
    @enderror
      </div>

      <div class="formbold-mb-5">
        <label for="password_confirmation" class="formbold-form-label">
          Confirm Password: Min 6 characters
        </label>
        <input
          type="password" placeholder="Enter your password"
          class="formbold-form-input" 
          name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" required /><br>
    @error('password_confirmation')
        <span class="error">{{ $message }}</span>
    @enderror
      </div>


      <div class="mb-6 pt-4">
        <label class="formbold-form-label formbold-form-label-2">
          Upload an Image
        </label>

        <div class="formbold-mb-5 formbold-file-input">
          <input type="file" class="formbold-form-input" name="profile_picture" id="profile_picture" value="{{ old('profile_picture') }}"  />
          @error('profile_picture')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

      </div>

      <div>
        <input  class="formbold-btn w-full" type="submit" name="Register" value="Register" >
      </div>
    </form>
  </div>
</div>

</body>
</html>