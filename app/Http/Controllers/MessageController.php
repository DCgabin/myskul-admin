<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Message;
use App\Models\Option;
use App\Models\Speciality;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('messages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $levels = collect(Level::get())->map( function ($level) {
           return new Option($level->name, $level->name);
        });

        $levels->add( new Option('Tous', 'ALL') );

        // TODO: Remove unnecessary specialities in the Database
//        $specialities = collect(Speciality::get())->map( function ($speciality) {
//           return new Option($speciality->name, $speciality->name);
//        });
        $specialities = collect([new Option('Pharmacie', 'PHARMACIE'),
            new Option('Médecine Dentaire', 'MEDECINE_DENTAIRE'),
            new Option('Médecine Générale', 'MEDECINE_GENERALE'),
            new Option('Toutes', 'ALL'),
        ]);

        return view('messages.create', compact('levels', 'specialities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'message' => ['min:5'],
            'level' => [function ($attribute, $value, $fail) {
                    if ($value !== 'ALL' && ! \DB::table('levels')->where('level', $value)->exists()) {
                        return $fail($attribute.' is invalid.');
                    }
                },
            ],
            'speciality' => [function ($attribute, $value, $fail) {
                    if ($value !== 'ALL' && ! \DB::table('specialities')->where('speciality', $value)->exists()) {
                        return $fail($attribute.' is invalid.');
                    }
                },
            ],
        ]);

        $levels = ($attributes['level'] === 'ALL')
            ? Level::get()
            : Level::where('level', $attributes['level'])->get();

        $specialities = ($attributes['speciality'] === 'ALL')
            ? Speciality::get()
            : Speciality::where('speciality', $attributes['speciality'])->get();

        foreach ($levels as $level) {
            foreach ($specialities as $speciality) {
                Message::create([
                    'message' => $attributes['message'],
                    'sendAt' => Carbon::now()->format('D M d Y H:i:s'),
                    'level_id' => $level->id,
                    'speciality_id' => $speciality->id,
                    'user_id' => \Auth::id()
                ]);
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Message $message)
    {
        $message->deleteOrFail();
        return redirect()->back();
    }
}
