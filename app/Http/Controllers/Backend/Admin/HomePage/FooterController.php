<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use App\Models\Setting;
use App\Models\FooterOne;
use App\Models\FooterTwo;
use App\Models\FooterFour;
use App\Models\SocalMedia;
use App\Models\FooterThree;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FooterFourReqest;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\FooterOneRequest;
use App\Http\Requests\FooterTwoRequest;
use App\Http\Requests\FooterThreeReqest;
use Yajra\DataTables\Facades\DataTables;

class FooterController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Footer Card One Section');
            $data['parentFooter']        = 'expanded';
            $data['parentFooterSubMenu'] = 'style="display: block;"';
            $data['footerCardOne']       = 'active';
            $data['breadcrumb']          = ['Footer Card One Section' => '',];
            $data['socalMedias']         = SocalMedia::where('status', '1')->get();
            $data['footerOneData']       = FooterOne::where('status', '1')->first();
            return view('backend.pages.footer.footer-one.index', $data);
        } else {
            abort(401);
        }
    }

    public function createOrUpdate(FooterOneRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            FooterOne::updateOrCreate(['id' => $request->update_id], [
                'title'       => $request->title,
                'socal_media' => json_encode($request->socal_media),
                'discrption'  => $request->discrption,
                'status'      => $request->status,
            ]);
            return back()->with('success', 'Footer One Create Or Update Successfuly !!');
        } else {
            abort(401);
        }
    }

    public function twoIndex()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Footer Card Two Section');
            $data['parentFooter']        = 'expanded';
            $data['parentFooterSubMenu'] = 'style="display: block;"';
            $data['footerCardTwo']       = 'active';
            $data['breadcrumb']          = ['Footer Card Two Section' => '',];
            return view('backend.pages.footer.footer-two.index', $data);
        } else {
            abort(401);
        }
    }

    public function twoCreate()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Footer Card Two Section Create ');
            $data['parentFooter']        = 'expanded';
            $data['parentFooterSubMenu'] = 'style="display: block;"';
            $data['footerCardTwo']       = 'active';
            $data['breadcrumb']          = ['Footer Card Two Section' => route('admin.footer.two.index'),'Footer Card Two Section Create' => '',];
            $data['totalFooterTwo']      = FooterTwo::all();
            return view('backend.pages.footer.footer-two.create', $data);
        } else {
            abort(401);
        }
    }

    public function twoTitleStore(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            $inputs = $request->validate([
                'footertwotitle' => 'max:50',
            ]);
            $settings = [];
            foreach ($inputs as $key => $value) {
                $settings[] = [
                    'option_key' => $key,
                    'option_value' => $value,
                ];
            }
            Setting::upsert($settings, ['option_key'], ['option_value']);
            return back()->with('success', 'Store Successfully !');
        } else {
            abort(401);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->ajax()) {
                $getData = FooterTwo::latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $query->when($request->search, function ($query, $value) {
                                $query->where('name', 'like', "%{$value}%")
                                    ->orWhere('order_by', 'like', "%{$value}%");
                            });
                        }
                    })
                    ->addColumn('name', function ($data) {
                        return $data->name;
                    })
                    ->addColumn('url', function ($data) {
                        return $data->url;
                    })
                    ->addColumn('target', function ($data) {
                        return target($data->target);
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('side', function ($data) {
                        return side($data->side);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.footer.two.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.footer.two.delete', ['id' => $data->id]) . '"
                    id="delete-form-' . $data->id . '" method="DELETE" class="d-none">
                    @csrf
                    @method("DELETE") </form></div>';
                    })
                    ->rawColumns(['target', 'side', 'status', 'action'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }

    public function twoStore(FooterTwoRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            FooterTwo::create([
                'name'     => $request->name,
                'url'      => $request->url,
                'target'   => $request->target,
                'side'     => $request->side,
                'order_by' => $request->order_by,
                'status'   => $request->status,
            ]);
            return redirect()->route('admin.footer.two.index')->with('success', 'Footer Two Create Successful!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Footer Card Two Section Edit ');
            $data['parentFooter']        = 'expanded';
            $data['parentFooterSubMenu'] = 'style="display: block;"';
            $data['footerCardTwo']       = 'active';
            $data['breadcrumb']          = ['Footer Card Two Section' => route('admin.footer.two.index'),'Footer Card Two Section Edit' => '',];
            $data['editFooterTwo']       = FooterTwo::where('id',$id)->first();
            return view('backend.pages.footer.footer-two.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(FooterTwoRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editValue = FooterTwo::where('id',$request->update_id)->first();
            $editValue->update([
                'name'     => $request->name,
                'url'      => $request->url,
                'target'   => $request->target,
                'side'     => $request->side,
                'order_by' => $request->order_by,
                'status'   => $request->status,
            ]);
            return redirect()->route('admin.footer.two.index')->with('success', 'Footer Two Update Successful!');
        } else {
            abort(401);
        }
    }

    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editValue = FooterTwo::where('id',$id)->first();
            $editValue->delete();
            return back()->with('success', 'Footer Two Delete Successful!');
        } else {
            abort(401);
        }
    }

    public function footerThree()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Footer Card Three Section');
            $data['parentFooter']        = 'expanded';
            $data['parentFooterSubMenu'] = 'style="display: block;"';
            $data['footerCardThree']     = 'active';
            $data['breadcrumb']          = ['Footer Card Three Section' => '',];
            $data['footerThreeData']     = FooterThree::where('status', '1')->first();
            return view('backend.pages.footer.footer-three.index', $data);
        } else {
            abort(401);
        }
    }

    public function threeCreateOrUpdate(FooterThreeReqest $request)
    {
        if (Gate::allows('isAdmin')) {
            FooterThree::updateOrCreate(['id' => $request->update_id], [
                'title'       => $request->title,
                'sub_title'   => $request->sub_title,
                'discription' => $request->discription,
                'status'      => $request->status,
            ]);
            return back()->with('success', 'Footer Three Create Or Update Successfuly !!');
        } else {
            abort(401);
        }
    }

    public function footerFour()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Footer Card Four Section');
            $data['parentFooter']        = 'expanded';
            $data['parentFooterSubMenu'] = 'style="display: block;"';
            $data['footerCardFour']      = 'active';
            $data['breadcrumb']          = ['Footer Card Four Section' => '',];
            $data['footerFourData']      = FooterFour::where('status', '1')->first();
            return view('backend.pages.footer.footer-four.index', $data);
        } else {
            abort(401);
        }
    }

    public function fourCreateOrUpdate(FooterFourReqest $request)
    {
        if (Gate::allows('isAdmin')) {
            FooterFour::updateOrCreate(['id' => $request->update_id], [
                'title'       => $request->title,
                'discription' => $request->discription,
                'status'      => $request->status,
            ]);
            return back()->with('success', 'Footer Four Create Or Update Successfuly !!');
        } else {
            abort(401);
        }
    }
}
