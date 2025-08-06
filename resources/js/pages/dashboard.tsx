import React from 'react';
import { AppShell } from '@/components/app-shell';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Badge } from '@/components/ui/badge';
import { router } from '@inertiajs/react';

interface Props {
    user: {
        name: string;
        email: string;
    };
    stats?: {
        total_students?: number;
        total_teachers?: number;
        total_payments?: number;
        pending_letters?: number;
    };
    [key: string]: unknown;
}

export default function Dashboard({ user, stats }: Props) {
    const modules = [
        {
            icon: '🏠',
            title: 'Beranda',
            description: 'Dashboard utama sistem',
            path: '/',
            color: 'bg-blue-500'
        },
        {
            icon: '🏫',
            title: 'Profil Madrasah',
            description: 'Kelola profil dan informasi madrasah',
            path: '/profil',
            color: 'bg-green-500'
        },
        {
            icon: '👥',
            title: 'Data Siswa',
            description: 'Manajemen data siswa',
            path: '/siswa',
            color: 'bg-purple-500',
            count: stats?.total_students
        },
        {
            icon: '💰',
            title: 'Pembayaran SPP',
            description: 'Sistem pembayaran dan monitoring SPP',
            path: '/pembayaran',
            color: 'bg-yellow-500',
            count: stats?.total_payments
        },
        {
            icon: '👨‍🏫',
            title: 'Data Guru',
            description: 'Manajemen data guru dan staff',
            path: '/guru',
            color: 'bg-indigo-500',
            count: stats?.total_teachers
        },
        {
            icon: '👨‍💼',
            title: 'Wali Kelas',
            description: 'Penugasan dan manajemen wali kelas',
            path: '/wali-kelas',
            color: 'bg-teal-500'
        },
        {
            icon: '📝',
            title: 'Surat Keluar Masuk',
            description: 'Administrasi surat menyurat',
            path: '/surat',
            color: 'bg-orange-500',
            count: stats?.pending_letters
        },
        {
            icon: '🎓',
            title: 'Pengambilan Ijazah',
            description: 'Pencatatan pengambilan ijazah',
            path: '/ijazah',
            color: 'bg-pink-500'
        },
        {
            icon: '🏫',
            title: 'Penempatan Kelas',
            description: 'Pengaturan penempatan siswa',
            path: '/penempatan-kelas',
            color: 'bg-red-500'
        },
        {
            icon: '📄',
            title: 'Surat Mutasi',
            description: 'Pengelolaan surat mutasi siswa',
            path: '/mutasi',
            color: 'bg-cyan-500'
        },
        {
            icon: '🆔',
            title: 'Kartu Pelajar',
            description: 'Pencetakan kartu pelajar',
            path: '/kartu-pelajar',
            color: 'bg-lime-500'
        },
        {
            icon: '🎨',
            title: 'Pengaturan Background',
            description: 'Ubah tema dan animasi latar belakang',
            path: '/background-settings',
            color: 'bg-violet-500'
        }
    ];

    const quickStats = [
        {
            title: 'Total Siswa',
            value: stats?.total_students || '0',
            icon: '👥',
            color: 'text-blue-600'
        },
        {
            title: 'Total Guru',
            value: stats?.total_teachers || '0',
            icon: '👨‍🏫',
            color: 'text-green-600'
        },
        {
            title: 'Pembayaran Bulan Ini',
            value: stats?.total_payments || '0',
            icon: '💰',
            color: 'text-yellow-600'
        },
        {
            title: 'Surat Pending',
            value: stats?.pending_letters || '0',
            icon: '📝',
            color: 'text-red-600'
        }
    ];

    const recentActivities = [
        '📝 Surat masuk baru dari Kemenag',
        '💰 Pembayaran SPP Ahmad Rizki diterima',
        '👥 Data siswa baru Fatimah Az-Zahra ditambahkan',
        '🎓 Ijazah Muhammad Fadli telah diambil'
    ];

    return (
        <AppShell>
            <div className="space-y-6">
                {/* Header */}
                <div className="bg-gradient-to-r from-green-600 to-blue-600 rounded-lg p-8 text-white">
                    <h1 className="text-3xl font-bold mb-2">
                        🏫 Selamat Datang di SIMADAM
                    </h1>
                    <p className="text-lg opacity-90">
                        Sistem Informasi Manajemen MA Darul Muttaqien
                    </p>
                    <p className="text-sm opacity-80 mt-2">
                        Pengguna: {user.name} ({user.email})
                    </p>
                </div>

                {/* Running Text */}
                <div className="bg-green-100 border border-green-200 rounded-lg p-4 overflow-hidden">
                    <div className="animate-marquee whitespace-nowrap text-green-800">
                        <span className="mx-8">📚 Sistem SIMADAM - Platform terpadu manajemen madrasah</span>
                        <span className="mx-8">🎯 Kelola data siswa, guru, dan administrasi dengan mudah</span>
                        <span className="mx-8">⚡ Solusi digital untuk kemajuan madrasah Indonesia</span>
                    </div>
                </div>

                {/* Quick Stats */}
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    {quickStats.map((stat, index) => (
                        <Card key={index} className="hover:shadow-md transition-shadow">
                            <CardHeader className="flex flex-row items-center justify-between space-y-0 pb-2">
                                <CardTitle className="text-sm font-medium text-muted-foreground">
                                    {stat.title}
                                </CardTitle>
                                <span className="text-2xl">{stat.icon}</span>
                            </CardHeader>
                            <CardContent>
                                <div className={`text-2xl font-bold ${stat.color}`}>
                                    {stat.value}
                                </div>
                            </CardContent>
                        </Card>
                    ))}
                </div>

                {/* Modules Grid */}
                <div>
                    <h2 className="text-2xl font-bold text-gray-900 mb-6">
                        📋 Modul Aplikasi
                    </h2>
                    
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        {modules.map((module, index) => (
                            <Card key={index} className="hover:shadow-lg transition-all duration-300 cursor-pointer group">
                                <CardHeader className="text-center pb-3">
                                    <div className={`w-16 h-16 ${module.color} rounded-full flex items-center justify-center mx-auto mb-3 text-white text-2xl group-hover:scale-110 transition-transform`}>
                                        {module.icon}
                                    </div>
                                    <div className="flex items-center justify-between">
                                        <CardTitle className="text-lg text-gray-900">
                                            {module.title}
                                        </CardTitle>
                                        {module.count !== undefined && (
                                            <Badge variant="secondary">
                                                {module.count}
                                            </Badge>
                                        )}
                                    </div>
                                </CardHeader>
                                <CardContent>
                                    <CardDescription className="text-center text-gray-600 mb-4">
                                        {module.description}
                                    </CardDescription>
                                    <Button 
                                        className="w-full" 
                                        variant="outline"
                                        onClick={() => router.get(module.path)}
                                    >
                                        <span className="mr-2">🚀</span>
                                        Buka Modul
                                    </Button>
                                </CardContent>
                            </Card>
                        ))}
                    </div>
                </div>

                {/* Recent Activities */}
                <div className="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div className="lg:col-span-2">
                        <Card>
                            <CardHeader>
                                <CardTitle className="flex items-center">
                                    <span className="mr-2">📊</span>
                                    Aktivitas Terbaru
                                </CardTitle>
                                <CardDescription>
                                    Ringkasan aktivitas sistem dalam 24 jam terakhir
                                </CardDescription>
                            </CardHeader>
                            <CardContent>
                                <div className="space-y-3">
                                    {recentActivities.map((activity, index) => (
                                        <div key={index} className="flex items-center p-3 bg-gray-50 rounded-lg">
                                            <div className="text-sm text-gray-700">
                                                {activity}
                                            </div>
                                        </div>
                                    ))}
                                </div>
                            </CardContent>
                        </Card>
                    </div>
                    
                    <div>
                        <Card>
                            <CardHeader>
                                <CardTitle className="flex items-center">
                                    <span className="mr-2">💡</span>
                                    Tips Hari Ini
                                </CardTitle>
                            </CardHeader>
                            <CardContent className="space-y-4">
                                <div className="p-4 bg-blue-50 rounded-lg">
                                    <p className="text-sm text-blue-800">
                                        💡 Backup data siswa secara berkala untuk menjaga keamanan data
                                    </p>
                                </div>
                                <div className="p-4 bg-green-50 rounded-lg">
                                    <p className="text-sm text-green-800">
                                        📈 Gunakan fitur laporan untuk analisis performa akademik
                                    </p>
                                </div>
                                <div className="p-4 bg-yellow-50 rounded-lg">
                                    <p className="text-sm text-yellow-800">
                                        ⏰ Pantau pembayaran SPP yang belum lunas setiap bulan
                                    </p>
                                </div>
                            </CardContent>
                        </Card>
                    </div>
                </div>
            </div>

            <style>{`
                @keyframes marquee {
                    0% { transform: translateX(100%); }
                    100% { transform: translateX(-100%); }
                }
                
                .animate-marquee {
                    animation: marquee 25s linear infinite;
                }
            `}</style>
        </AppShell>
    );
}