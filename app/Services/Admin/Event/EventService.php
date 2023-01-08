<?php

    namespace App\Services\Admin\Event;

    use Alert;
    use Exception;
    use App\Models\Event;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Facades\Validator;
    use App\Http\Requests\Admin\Event\EventRequest;

    class EventService {

        public function error($kalimat)
        {
            Alert::error('Oops', $kalimat);
            return redirect()->back()->withInput();
        }

        public function index()
        {
            try {
                $events = Event::select('id', 'title', 'date', 'type', 'image')->get();
                
                return view(
                    'dashboard.admin.event.index',
                    ["title" => "event"],
                    compact('events')
                );
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function create()
        {
            try {
        
                return view('dashboard.admin.event.create', ["title" => "event"]);
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
            
        }

        public function edit($id)
        {
            try {
                $event = Event::where('id', $id)->first();
                    
                return view(
                    'dashboard.admin.event.edit',
                    ["title" => "event"],
                    compact('event')
                );
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function store(EventRequest $request)
        {
            try {

                $dateNow = date("Y-m-d");
                if($request->date < $dateNow){
                    toast('Tanggal event harus lebih dari tanggal sekarang','error');
                    return redirect()->back()->withInput();
                }
                
                $event = Event::create($request->all());

                Alert::success('Naice', 'Event berhasil ditambahkan');
                return redirect('/admin/event');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function update($id, EventRequest $request)
        {
            try {

                $dateNow = date("Y-m-d");
                if($request->date < $dateNow){
                    toast('Tanggal event harus lebih dari tanggal sekarang','error');
                    return redirect()->back()->withInput();
                }

                $data = Event::where('id', $id)->first();

                $data->update($request->all());

                Alert::success('Naice', 'Event berhasil diupdate');
                return redirect('/admin/event');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function delete($id)
        {
            try {
                $data = Event::where('id', $id)->first();
                $data->users()->detach();
                $data->delete();

                Alert::success('Naice', 'Event berhasil dihapus');
                return redirect('/admin/event');
            }catch (Exception $e){
                return $this->error('Terjadi Kesalahan');
            }
        }

        public function updateImage($id, Request $request)
        {
            $rules = [
                'image' => 'required|mimes:jpg,jpeg,png|max:5048',
            ];

            Validator::make($request->all(), $rules, $messages = 
            [
                'image.required'    => 'gambar harus diisi',
                'image.mimes'       => 'format gambar harus berupa JPG, PNG atau JPEG',
                'image.max'         => 'maximal gambar adalah 5 mb',
            ])->validate();

            try {

                $data = Event::where('id', $id)->first();

                if(Storage::disk('local')->exists('public/event/' . $data->image)){
                    Storage::delete('public/event/' . $data->image);
                }
                
                $imageFile = $request->file('image');
                $image     = time() . '-' . $imageFile->getClientOriginalName();
                Storage::putFileAs('public/event/', $imageFile, $image);

                $data->update(['image' => $image]);

                Alert::success('Mantap', 'Gambar berhasil diupdate');
                return redirect()->back();
            }catch (Exception $e) {
                return $this->error('Terjadi Kesalahan');
            }
        }
    }
?>