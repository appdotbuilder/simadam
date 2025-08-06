import React from 'react';
import { AppShell } from '@/components/app-shell';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Badge } from '@/components/ui/badge';
import { router } from '@inertiajs/react';

interface Student {
    id: number;
    nis: string;
    nama: string;
    jenis_kelamin: 'L' | 'P';
    kelas: string;
    status: 'aktif' | 'tidak_aktif' | 'mutasi';
    nama_orang_tua: string;
    created_at: string;
}

interface Props {
    students: {
        data: Student[];
        current_page: number;
        last_page: number;
        per_page: number;
        total: number;
    };
    [key: string]: unknown;
}

export default function StudentsIndex({ students }: Props) {
    const getStatusColor = (status: string) => {
        switch (status) {
            case 'aktif':
                return 'bg-green-100 text-green-800';
            case 'tidak_aktif':
                return 'bg-red-100 text-red-800';
            case 'mutasi':
                return 'bg-yellow-100 text-yellow-800';
            default:
                return 'bg-gray-100 text-gray-800';
        }
    };

    const getStatusText = (status: string) => {
        switch (status) {
            case 'aktif':
                return 'Aktif';
            case 'tidak_aktif':
                return 'Tidak Aktif';
            case 'mutasi':
                return 'Mutasi';
            default:
                return status;
        }
    };

    return (
        <AppShell>
            <div className="space-y-6">
                {/* Header */}
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold text-gray-900 flex items-center">
                            <span className="mr-3">👥</span>
                            Data Siswa
                        </h1>
                        <p className="text-gray-600 mt-2">
                            Kelola data siswa MA Darul Muttaqien
                        </p>
                    </div>
                    
                    <Button 
                        onClick={() => router.get('/siswa/create')}
                        className="bg-green-600 hover:bg-green-700"
                    >
                        <span className="mr-2">➕</span>
                        Tambah Siswa
                    </Button>
                </div>

                {/* Stats Cards */}
                <div className="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <Card>
                        <CardHeader className="flex flex-row items-center justify-between space-y-0 pb-2">
                            <CardTitle className="text-sm font-medium text-muted-foreground">
                                Total Siswa
                            </CardTitle>
                            <span className="text-2xl">👥</span>
                        </CardHeader>
                        <CardContent>
                            <div className="text-2xl font-bold text-green-600">
                                {students.total}
                            </div>
                        </CardContent>
                    </Card>
                    
                    <Card>
                        <CardHeader className="flex flex-row items-center justify-between space-y-0 pb-2">
                            <CardTitle className="text-sm font-medium text-muted-foreground">
                                Siswa Aktif
                            </CardTitle>
                            <span className="text-2xl">✅</span>
                        </CardHeader>
                        <CardContent>
                            <div className="text-2xl font-bold text-blue-600">
                                {students.data.filter(s => s.status === 'aktif').length}
                            </div>
                        </CardContent>
                    </Card>
                    
                    <Card>
                        <CardHeader className="flex flex-row items-center justify-between space-y-0 pb-2">
                            <CardTitle className="text-sm font-medium text-muted-foreground">
                                Siswa Laki-laki
                            </CardTitle>
                            <span className="text-2xl">👨</span>
                        </CardHeader>
                        <CardContent>
                            <div className="text-2xl font-bold text-indigo-600">
                                {students.data.filter(s => s.jenis_kelamin === 'L').length}
                            </div>
                        </CardContent>
                    </Card>
                    
                    <Card>
                        <CardHeader className="flex flex-row items-center justify-between space-y-0 pb-2">
                            <CardTitle className="text-sm font-medium text-muted-foreground">
                                Siswa Perempuan
                            </CardTitle>
                            <span className="text-2xl">👩</span>
                        </CardHeader>
                        <CardContent>
                            <div className="text-2xl font-bold text-pink-600">
                                {students.data.filter(s => s.jenis_kelamin === 'P').length}
                            </div>
                        </CardContent>
                    </Card>
                </div>

                {/* Students Table */}
                <Card>
                    <CardHeader>
                        <CardTitle className="flex items-center">
                            <span className="mr-2">📋</span>
                            Daftar Siswa
                        </CardTitle>
                        <CardDescription>
                            Menampilkan {students.data.length} dari {students.total} siswa
                        </CardDescription>
                    </CardHeader>
                    <CardContent>
                        <div className="overflow-x-auto">
                            <table className="w-full">
                                <thead>
                                    <tr className="border-b border-gray-200">
                                        <th className="text-left py-3 px-4 font-medium text-gray-900">NIS</th>
                                        <th className="text-left py-3 px-4 font-medium text-gray-900">Nama Siswa</th>
                                        <th className="text-left py-3 px-4 font-medium text-gray-900">J.K</th>
                                        <th className="text-left py-3 px-4 font-medium text-gray-900">Kelas</th>
                                        <th className="text-left py-3 px-4 font-medium text-gray-900">Orang Tua</th>
                                        <th className="text-left py-3 px-4 font-medium text-gray-900">Status</th>
                                        <th className="text-center py-3 px-4 font-medium text-gray-900">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {students.data.length === 0 ? (
                                        <tr>
                                            <td colSpan={7} className="text-center py-12 text-gray-500">
                                                <div className="flex flex-col items-center">
                                                    <span className="text-6xl mb-4">📚</span>
                                                    <p className="text-lg font-medium">Belum Ada Data Siswa</p>
                                                    <p className="text-sm mt-2">Klik tombol "Tambah Siswa" untuk mulai menambahkan data</p>
                                                </div>
                                            </td>
                                        </tr>
                                    ) : (
                                        students.data.map((student) => (
                                            <tr key={student.id} className="border-b border-gray-100 hover:bg-gray-50">
                                                <td className="py-3 px-4 font-mono text-sm">{student.nis}</td>
                                                <td className="py-3 px-4">
                                                    <div className="font-medium text-gray-900">{student.nama}</div>
                                                </td>
                                                <td className="py-3 px-4">
                                                    <span className={`inline-flex items-center px-2 py-1 rounded-full text-xs font-medium ${
                                                        student.jenis_kelamin === 'L' 
                                                            ? 'bg-blue-100 text-blue-800' 
                                                            : 'bg-pink-100 text-pink-800'
                                                    }`}>
                                                        {student.jenis_kelamin === 'L' ? '👨 L' : '👩 P'}
                                                    </span>
                                                </td>
                                                <td className="py-3 px-4">
                                                    <Badge variant="outline">
                                                        {student.kelas}
                                                    </Badge>
                                                </td>
                                                <td className="py-3 px-4 text-sm text-gray-600">{student.nama_orang_tua}</td>
                                                <td className="py-3 px-4">
                                                    <span className={`inline-flex items-center px-2 py-1 rounded-full text-xs font-medium ${getStatusColor(student.status)}`}>
                                                        {getStatusText(student.status)}
                                                    </span>
                                                </td>
                                                <td className="py-3 px-4">
                                                    <div className="flex items-center justify-center space-x-2">
                                                        <Button 
                                                            variant="outline" 
                                                            size="sm"
                                                            onClick={() => router.get(`/siswa/${student.id}`)}
                                                        >
                                                            <span className="mr-1">👁️</span>
                                                            Lihat
                                                        </Button>
                                                        <Button 
                                                            variant="outline" 
                                                            size="sm"
                                                            onClick={() => router.get(`/siswa/${student.id}/edit`)}
                                                        >
                                                            <span className="mr-1">✏️</span>
                                                            Edit
                                                        </Button>
                                                    </div>
                                                </td>
                                            </tr>
                                        ))
                                    )}
                                </tbody>
                            </table>
                        </div>

                        {/* Pagination */}
                        {students.last_page > 1 && (
                            <div className="mt-6 flex items-center justify-between">
                                <div className="text-sm text-gray-600">
                                    Halaman {students.current_page} dari {students.last_page}
                                </div>
                                <div className="flex space-x-2">
                                    {students.current_page > 1 && (
                                        <Button 
                                            variant="outline" 
                                            size="sm"
                                            onClick={() => router.get(`/siswa?page=${students.current_page - 1}`)}
                                        >
                                            ← Sebelumnya
                                        </Button>
                                    )}
                                    {students.current_page < students.last_page && (
                                        <Button 
                                            variant="outline" 
                                            size="sm"
                                            onClick={() => router.get(`/siswa?page=${students.current_page + 1}`)}
                                        >
                                            Selanjutnya →
                                        </Button>
                                    )}
                                </div>
                            </div>
                        )}
                    </CardContent>
                </Card>
            </div>
        </AppShell>
    );
}