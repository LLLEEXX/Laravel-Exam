<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PositionController extends Controller
{
    public function store_position(Request $request)
    {

        $this->formatPositionName($request);

        $validator = Validator::make($request->all(), $this->getValidationRules(), $this->getValidationMessages($request));

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }


        if ($request->input('position-name') !== 'CEO' && $request->input('reports-to') === '') {
            return response()->json(['message' => 'Report to cannot be nulled for this position'], 422);
        }

        $position = new Position();
        $position->position_name = $request->input('position-name');
        $position->reports_to = $request->input('reports-to');
        $position->save();

        return response()->json(['message' => 'Position created successfully'], 201);

    }

    public function get_all_positions(Request $request)
    {
        $sortOrder = $request->input('sort_order', 'asc'); 

        if($sortOrder !== 'asc' && $sortOrder !== 'desc') {
            return response()->json(['message' => 'Sorting Order Invalid'], 402);
        }

        $positions = Position::orderBy('position_name', $sortOrder)->get();
        return response()->json($positions);
    }

    public function update_position(Request $request, $id)
    {
        $this->formatPositionName($request);

        $position = Position::find($id);

        if (!$position) {
            return response()->json(['message' => 'Position not found'], 404);
        }


        $validator = Validator::make($request->all(), $this->updateValidationRules(), $this->getValidationMessages($request));

        // Check validation for postman
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->input('position-name') !== 'CEO' && $request->input('reports-to') === '') {
            return response()->json(['message' => 'Report to cannot be nulled for this position'], 422);
        }


        $position->position_name = $request->input('position-name');
        $position->reports_to = $request->input('reports-to');

        $position->save();

        return response()->json(['message' => 'Position successfully updated'], 200);
    }

    public function delete_position($id)
    {
        $position = Position::find($id);

        if (!$position) {
            return response()->json(['message' => 'Position not found'], 404);
        }

        $position->delete();

        return response()->json(['message' => 'Position successfully deleted'], 200);
    }

    public function get_position(Request $request)
    {
        $name = $request->query('name');
    
        if (!$name) {
            return response()->json(['message' => 'Position name is required'], 400);
        }
    
        $this->formatPositionName($request);
    
        $position = Position::where('position_name', $name)->first();
    
        if (!$position) {
            return response()->json(['message' => 'Position not found'], 404);
        }
    
        return response()->json($position, 200);
    }





    /**
     * Reusable Functions
     */
    protected $allowedPositions = [
        'CEO',
        'MANAGER',
        'DEVELOPMENT LEAD',
        'SENIOR DEVELOPER 1',
        'SENIOR DEVELOPER 2',
        'QA LEAD',
        'SENIOR QA TESTER',
        'DEVELOPER 3',
        'QA TESTER 1',
        'QA TESTER 2',
        'DEVELOPER 2',
        'DEVELOPER 1'
    ];

    protected function getValidationMessages($request)
    {
        return [
            'position-name.required' => 'The position name field is required.',
            'position-name.in' => 'The position \'' . $request->input('position-name') . '\' does not exist',
            'position-name.unique' => 'The position name already exists in the system.',
            'reports-to.in' => 'The reports-to field must be a valid position from the list.'
        ];
    }

    protected function getValidationRules()
    {
        return [
            'position-name' => [
                'required',
                'unique:positions,position_name',
                Rule::in($this->allowedPositions), // Check if the position exists
            ],
            'reports-to' => [
                'nullable',
                Rule::in($this->allowedPositions),
            ]
        ];
    }

    protected function updateValidationRules()
    {
        return [
            'position-name' => [
                'required',
                Rule::in($this->allowedPositions), // Check if the position exists
            ],
            'reports-to' => [
                'nullable',
                Rule::in($this->allowedPositions),
            ]
        ];
    }

    protected function formatPositionName(Request $request)
    {
        $request->merge([
            'position-name' => strtoupper($request->input('position-name')),
            'reports-to' => strtoupper($request->input('reports-to'))
        ]);
    }

}
