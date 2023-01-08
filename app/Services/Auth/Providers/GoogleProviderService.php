<?php

    namespace App\Services\Auth\Providers;

    use Laravel\Socialite\Facades\Socialite;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use App\Models\User;
    use Exception;

    class GoogleProviderService {

        public function error($kalimat, $url)
        {
            alert()->error('Maaf', $kalimat);
            return redirect($url)->withInput();
        }

        public function login()
        {
            return Socialite::driver('google')->redirect();
        }

        public function handleCallback()
        {
            try {
                $data = Socialite::driver('google')->stateless()->user()->getRaw();

                $user = User::where('email', $data['email'])->first();

                if($user){
                    Auth::login($user);
                    toast('Selamat datang ' . Auth::user()->name,'success');
                    
                    if(Auth::user()->role == 'admin'){
                        return redirect('/admin/main');
                    }

                    return redirect('/dashboard/main');
                }

                $new = User::create([
                    'email'     => $data['email'],
                    'name'      => $data['name'],
                    'role'      => 'user',
                ]);

                Auth::login($new);
                toast('Selamat datang ' . Auth::user()->name,'success');
                
                if(Auth::user()->role == 'admin'){
                    return redirect('/admin/main');
                }

                return redirect('/dashboard/main');

            } catch(Exception $e){
                return $this->error('Terjadi Kesalahan', '/login');
            }
        }
    }

?>