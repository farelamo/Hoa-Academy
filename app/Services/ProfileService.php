<?php

    namespace App\Services;

    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Storage;
    use App\Http\Requests\ProfileRequest;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Http\Request;
    use App\Models\User;
    use Carbon\Carbon;
    use Exception;
    use Alert;

    class ProfileService {

        public function error($kalimat)
        {
            Alert::error('Oops', $kalimat);
            return redirect()->back()->withInput();
        }

        public function index()
        {
            if(Auth::user()->role == 'user'){

                $total_course        = Auth::user()->courses()->count();
                $total_finish_course = Auth::user()->courses()->wherePivot('finished', true)->count();
                $total_events        = Auth::user()->events()->count();

                return view('dashboard/profil', ["title" => "Profil"], compact(
                    'total_course', 'total_finish_course', 'total_events'
                ));
            } else {
                return view('dashboard/profil', ["title" => "Profil"]);
            }
            
        }

        public function update(ProfileRequest $request)
        {
            try {
                $data = User::where('id', Auth::user()->id)->first();

                $data->update($request->all());
                
                Alert::success('Naice', 'Profil berhasil diupdate');
                return redirect()->back();
            }catch(Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function updateSmall(Request $request)
        {
            if($request->file('picture') && !$request->password){
                $rules = [
                    'picture' => 'mimes:jpg,jpeg,png|max:5048',
                ];
    
                Validator::make($request->all(), $rules, $messages = 
                [
                    'picture.mimes' => 'format gambar harus berupa JPG, PNG atau JPEG',
                    'picture.max'   => 'maximal gambar adalah 5 mb',
                ])->validate();

                $data = User::where('id', Auth::user()->id)->first();
                    
                $imageFile = $request->file('picture');
                $image     = time() . '-' . $imageFile->getClientOriginalName();
                Storage::putFileAs('public/users/', $imageFile, $image);

                $oldPicture = $data->picture;

                try {
                    
                    $data->update(['picture' => $image]);
                    if(Storage::disk('local')->exists('public/users/' .  $oldPicture)){
                        Storage::delete('public/users/' .  $oldPicture);
                    }
                    
                    Alert::success('Naice', 'Foto profil berhasil diupdate');
                    return redirect()->back();
                }catch(Exception $e){
                    if(Storage::disk('local')->exists('public/users/' . $image)){
                        Storage::delete('public/users/' . $image);
                    }
                    return $this->error('Terjadi Kesalahan');
                }

            }else if($request->password && !$request->file('picture')){
                $rules = ['password'  => 'min:8|alpha_num'];
    
                Validator::make($request->all(), $rules, $messages = 
                [
                    'password.min'       => 'minimal password adalah 8 karakter',
                    'password.alpha_num' => 'password hanya berupa angka dan huruf',
                ])->validate();

                try {
                    $data = User::where('id', Auth::user()->id)->first();
    
                    $data->update(['password' => Hash::make($request->password)]);
    
                    Auth::logout();
                    Alert::success('Naice', 'Password berhasil diubah, Silahkan login kembali');
                    return redirect('/login');
                }catch(Exception $e){
                    return $this->error('Terjadi Kesalahan');
                }

            }else{
                $rules = [
                    'picture'   => 'mimes:jpg,jpeg,png|max:5048',
                    'password'  => 'min:8|alpha_num'
                ];
    
                Validator::make($request->all(), $rules, $messages = 
                [
                    'password.min'       => 'minimal password adalah 8 karakter',
                    'password.alpha_num' => 'password hanya berupa angka dan huruf',
                    'picture.mimes'      => 'format gambar harus berupa JPG, PNG atau JPEG',
                    'picture.max'        => 'maximal gambar adalah 5 mb',
                ])->validate();

                $data = User::where('id', Auth::user()->id)->first();
                    
                $imageFile = $request->file('picture');
                $image     = time() . '-' . $imageFile->getClientOriginalName();
                Storage::putFileAs('public/users/', $imageFile, $image);

                $oldPicture = $data->picture;

                try {
                    
                    $data->update([
                        'picture'   => $image,
                        'password'  => Hash::make($request->password)
                    ]);

                    if(Storage::disk('local')->exists('public/users/' .  $oldPicture)){
                        Storage::delete('public/users/' .  $oldPicture);
                    }
                    
                    Auth::logout();
                    Alert::success('Naice', 'Password berhasil diubah, Silahkan login kembali');
                    return redirect('/login');
                }catch(Exception $e){
                    if(Storage::disk('local')->exists('public/users/' . $image)){
                        Storage::delete('public/users/' . $image);
                    }
                    return $this->error('Terjadi Kesalahan');
                }
            }
        }
    }

?>

