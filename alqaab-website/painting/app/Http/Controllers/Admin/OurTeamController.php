<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurTeam;
use Illuminate\Http\Request;

class OurTeamController extends Controller
{
    private $_base_route = 'admin.our-team';
    private $_panel = 'Our Team';

    public function index()
    {
        $teams = OurTeam::orderBy('display_order', 'desc')->get();
        return view('admin.our_team.index', [
            'teams' => $teams,
            '_panel' => $this->_panel,
            '_base_route' => $this->_base_route
        ]);
    }

    public function create()
    {
        return view('admin.our_team.create', [
            '_panel' => $this->_panel,
            '_base_route' => $this->_base_route
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'designation' => 'nullable|string|max:100',
            'image' => 'required|image|max:2048',
            'short_description' => 'required',
            'display_order' => 'nullable|integer',
            'status' => 'nullable'
        ]);

        $team = new OurTeam();
        $team->title = $request->title;
        $team->designation = $request->designation;
        $team->short_description = $request->short_description;
        $team->display_order = $request->display_order ?? 0;
        $team->status = $request->has('status');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'uploads/our_team/';
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($path, $filename);
            $team->image = $path . $filename;
        }

        $team->save();

        return redirect()->route($this->_base_route.'.index')
            ->with('success', $this->_panel.' member created successfully.');
    }

    public function edit(OurTeam $team)
    {
        return view('admin.our_team.edit', [
            'team' => $team,
            '_panel' => $this->_panel,
            '_base_route' => $this->_base_route
        ]);
    }

public function update(Request $request, OurTeam $team)
{
    $request->validate([
        'title' => 'required',
        'designation' => 'nullable|string|max:100',
        'image' => 'nullable|image|max:2048',
        'short_description' => 'required',
        'display_order' => 'nullable|integer',
        'status' => 'nullable',
        'remove_image' => 'nullable'
    ]);

    try {
        $team->title = $request->title;
        $team->designation = $request->designation;
        $team->short_description = $request->short_description;
        $team->display_order = $request->display_order ?? 0;
        $team->status = $request->has('status');

        // Remove image if requested
        if ($request->has('remove_image') && $team->image) {
            if (file_exists($team->image)) {
                unlink($team->image);
            }
            $team->image = null;
        }

        // Upload new image
        if ($request->hasFile('image')) {
            if ($team->image && file_exists($team->image)) {
                unlink($team->image);
            }

            $file = $request->file('image');
            $path = 'uploads/our_team/';
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($path, $filename); // No public_path
            $team->image = $path . $filename;
        }

        $team->save();

        return redirect()->route($this->_base_route.'.index')
            ->with('success', $this->_panel.' updated successfully.');

    } catch (\Exception $e) {
        return back()->withInput()
            ->with('error', 'Error updating member: '.$e->getMessage());
    }
}



    public function destroy(OurTeam $team)
    {
        if ($team->image && file_exists($team->image)) {
            unlink($team->image);
        }

        $team->delete();

        return redirect()->route($this->_base_route.'.index')
            ->with('success', $this->_panel.' member deleted successfully.');
    }
}