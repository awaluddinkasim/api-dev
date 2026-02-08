<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Mengambil semua user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = User::all();

        return $this->successResponse($users, 'Semua user berhasil diambil');
    }

    /**
     * Tambah user baru
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Database\QueryException
     */
    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($data->fails()) {
            return $this->validationErrorResponse('Tambah user gagal', $data->errors());
        }

        try {
            $user = User::create($data->validated());

            return $this->successResponse($user, 'User berhasil ditambahkan');
        } catch (QueryException $e) {
            return $this->errorResponse('Server Error', 500);
        }
    }

    /**
     * Mengambil data user berdasarkan uuid yang diberikan
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return $this->successResponse($user, 'User berhasil diambil');
    }

    /**
     * Mengupdate user berdasarkan uuid yang diberikan
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Database\QueryException
     */
    public function update(Request $request, User $user)
    {
        $data = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($data->fails()) {
            return $this->validationErrorResponse('Update user gagal', $data->errors());
        }

        try {
            $user->update($data->validated());

            return $this->successResponse($user, 'Update user berhasil');
        } catch (QueryException $e) {
            return $this->errorResponse('Server Error', 500);
        }
    }

    /**
     * Menghapus user berdasarkan uuid yang diberikan
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Database\QueryException
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();

            return $this->successResponse($user, 'User berhasil dihapus');
        } catch (QueryException $e) {
            return $this->errorResponse('Server Error', 500);
        }
    }
}
