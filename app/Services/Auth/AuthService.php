<?php 
    namespace App\Services\Auth;

    use App\Http\Requests\Auth\LoginValidator;
    use App\Http\Requests\Auth\RegisterValidator;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use App\Models\User;
    use Exception;
    Use Alert;

    class AuthService {

        public function error($kalimat, $url)
        {
            alert()->error('Maaf', $kalimat);
            return redirect($url)->withInput();
        }

        public function indexLogin()
        {
            return view('dashboard.login');
        }

        public function login(LoginValidator $request)
        {
            $user = User::where('email', $request->email)->first();

            if(!$user){
                return $this->error('Email tidak ditemukan', '/login');
            }

            if(Auth::Attempt([
                'email'     => $request->email,
                'password'  => $request->password,
            ])){

                toast('Selamat datang ' . Auth::user()->name,'success');

                if(Auth::user()->role == 'admin'){
                    return redirect('/admin/main');
                }

                return redirect('/dashboard/main');
            }

            return $this->error('Password Anda Salah', '/login');
        }
        
        public function indexRegister()
        {
            return view('dashboard.register');
        }

        public function register(RegisterValidator $request)
        {
            try {
                $user = User::where('email', $request->email)->first();

                if($user){
                    return $this->error('Email sudah terdaftar', '/register');
                }

                User::create([
                    'name'              => $request->name,
                    'email'             => $request->email,
                    'password'          => Hash::make($request->password),
                    'role'              => 'user',
                    'age'               => $request->age,
                    'gender'            => $request->gender,
                    'birth_date'        => $request->birth_date,
                    'address'           => $request->address,
                    'profession'        => $request->profession,
                    'mandarin_level'    => 0,
                    'poin'              => 0,
                ]);
                
                alert()->success('success', 'Akun Berhasil Dibuat');
                
                if(Auth::user()->role == 'admin'){
                    return redirect('/admin/main');
                }

                return redirect('/dashboard/main');
            } catch(Exception $e){
                return $this->error('Terjadi Kesalahan', '/register');
            }
        }

        public function logout()
        {
            Auth::logout();
            alert()->success('success', 'Anda berhasil logout');
            return redirect('/');
        }
    }
?>
