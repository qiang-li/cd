<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneBookRequest;
use App\Models\PhoneBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class PhoneBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $phoneBooks = PhoneBook::all();

        return View::make('phone_book_index', [ 'phone_books' => $phoneBooks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view::make('phone_book_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PhoneBookRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PhoneBookRequest $request)
    {
        $phoneBook = new PhoneBook();

        $phoneBook->first = $request->get('first');
        $phoneBook->last = $request->get('last');
        $phoneBook->phone = $request->get('phone');
        $phoneBook->email = $request->get('email');

        $phoneBook->save ();

        return redirect()->route('phone_book.index')->with ('message', 'Creation was successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PhoneBook  $phoneBook
     * @return \Illuminate\Http\Response
     */
    public function show(PhoneBook $phoneBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhoneBook  $phoneBook
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(PhoneBook $phoneBook)
    {
        return view::make('phone_book_edit', ['phone_book' => $phoneBook]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\PhoneBook  $phoneBook
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PhoneBookRequest $request, PhoneBook $phoneBook)
    {
        $phoneBook->first = $request->first;
        $phoneBook->last = $request->last;
        $phoneBook->phone = $request->phone;
        $phoneBook->email = $request->email;

        $phoneBook->save ();

        return redirect()->route('phone_book.index')->with('message', 'Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PhoneBook  $phoneBook
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(PhoneBook $phoneBook)
    {
        $id = $phoneBook->id;

        $phoneBook->delete();

        return redirect()->route('phone_book.index')
            ->with('message', 'Record[id:'.$id.'] was deleted');
    }
}
