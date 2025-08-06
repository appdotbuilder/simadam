import React from 'react';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';


interface Props {
    canLogin: boolean;
    canRegister: boolean;
    [key: string]: unknown;
}

export default function Welcome({ canLogin, canRegister }: Props) {
    const features = [
        {
            icon: '👥',
            title: 'Data Siswa',
            description: 'Kelola data siswa dengan lengkap dan terstruktur'
        },
        {
            icon: '💰',
            title: 'Pembayaran SPP',
            description: 'Sistem pencatatan dan monitoring pembayaran SPP'
        },
        {
            icon: '👨‍🏫',
            title: 'Data Guru & Wali Kelas',
            description: 'Manajemen data guru dan penugasan wali kelas'
        },
        {
            icon: '📝',
            title: 'Surat Keluar Masuk',
            description: 'Sistem administrasi surat menyurat madrasah'
        },
        {
            icon: '🎓',
            title: 'Pengambilan Ijazah',
            description: 'Pencatatan proses pengambilan ijazah siswa'
        },
        {
            icon: '🏫',
            title: 'Penempatan Kelas',
            description: 'Pengaturan penempatan siswa ke dalam kelas'
        },
        {
            icon: '📄',
            title: 'Surat Mutasi',
            description: 'Pengelolaan surat mutasi siswa'
        },
        {
            icon: '🆔',
            title: 'Kartu Pelajar',
            description: 'Sistem pencetakan kartu pelajar'
        }
    ];

    return (
        <div className="min-h-screen bg-gradient-to-br from-green-50 via-blue-50 to-indigo-100 relative overflow-hidden">
            {/* Animated Background Elements */}
            <div className="absolute inset-0 overflow-hidden">
                <div className="absolute -top-40 -right-40 w-80 h-80 bg-green-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob"></div>
                <div className="absolute -bottom-40 -left-40 w-80 h-80 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-2000"></div>
                <div className="absolute top-40 left-40 w-80 h-80 bg-indigo-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-4000"></div>
            </div>

            {/* Floating School Icons */}
            <div className="absolute inset-0 overflow-hidden pointer-events-none">
                <div className="absolute top-20 left-10 text-2xl opacity-20 animate-float">📚</div>
                <div className="absolute top-40 right-20 text-3xl opacity-20 animate-float animation-delay-1000">🏫</div>
                <div className="absolute bottom-40 left-20 text-2xl opacity-20 animate-float animation-delay-2000">✏️</div>
                <div className="absolute bottom-20 right-10 text-3xl opacity-20 animate-float animation-delay-3000">🎒</div>
                <div className="absolute top-1/2 left-1/4 text-2xl opacity-20 animate-float animation-delay-4000">📖</div>
                <div className="absolute top-1/3 right-1/3 text-2xl opacity-20 animate-float animation-delay-5000">🖊️</div>
            </div>

            <div className="relative z-10">
                {/* Header */}
                <header className="w-full bg-white/80 backdrop-blur-md shadow-sm border-b">
                    <div className="container mx-auto px-4 py-4">
                        <div className="flex items-center justify-between">
                            {/* Logo Area */}
                            <div className="flex items-center space-x-4">
                                <div className="w-16 h-16 bg-gradient-to-br from-green-500 to-blue-600 rounded-lg flex items-center justify-center shadow-lg">
                                    <span className="text-white text-2xl font-bold">🏫</span>
                                </div>
                                <div>
                                    <h1 className="text-2xl font-bold text-gray-800">SIMADAM</h1>
                                    <p className="text-sm text-gray-600">Sistem Informasi MA Darul Muttaqien</p>
                                </div>
                            </div>

                            {/* Auth Buttons */}
                            <div className="flex items-center space-x-4">
                                {canLogin && (
                                    <Button variant="outline" asChild>
                                        <a href="/login">Masuk</a>
                                    </Button>
                                )}
                                {canRegister && (
                                    <Button asChild>
                                        <a href="/register">Daftar</a>
                                    </Button>
                                )}
                            </div>
                        </div>
                    </div>
                </header>

                {/* Running Text */}
                <div className="bg-green-600 text-white py-2 overflow-hidden">
                    <div className="animate-marquee whitespace-nowrap">
                        <span className="text-sm font-medium mx-4">
                            🎉 Selamat datang di SIMADAM (Sistem Informasi MA Darul Muttaqien) - Platform terpadu untuk manajemen madrasah modern
                        </span>
                        <span className="text-sm font-medium mx-4">
                            📚 Kelola data siswa, guru, pembayaran SPP, dan administrasi madrasah dalam satu sistem
                        </span>
                        <span className="text-sm font-medium mx-4">
                            🏆 Solusi digital terdepan untuk pengelolaan madrasah yang efisien dan terintegrasi
                        </span>
                    </div>
                </div>

                {/* Main Content */}
                <main className="container mx-auto px-4 py-12">
                    {/* Hero Section */}
                    <div className="text-center mb-16">
                        <div className="inline-flex items-center space-x-2 bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-medium mb-6">
                            <span>🚀</span>
                            <span>Platform Manajemen Madrasah Modern</span>
                        </div>
                        
                        <h1 className="text-5xl font-bold text-gray-900 mb-6 leading-tight">
                            Sistem Informasi
                            <span className="bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent"> Manajemen Madrasah</span>
                        </h1>
                        
                        <p className="text-xl text-gray-600 max-w-3xl mx-auto mb-8 leading-relaxed">
                            SIMADAM adalah platform terpadu untuk mengelola semua aspek administrasi madrasah. 
                            Dari data siswa, pembayaran SPP, hingga surat-menyurat - semua dalam satu sistem yang mudah dan efisien.
                        </p>

                        <div className="flex flex-col sm:flex-row items-center justify-center gap-4">
                            {canLogin && (
                                <Button size="lg" className="px-8 py-3 text-lg" asChild>
                                    <a href="/login">
                                        <span className="mr-2">🔐</span>
                                        Masuk ke Dashboard
                                    </a>
                                </Button>
                            )}
                            {canRegister && (
                                <Button variant="outline" size="lg" className="px-8 py-3 text-lg" asChild>
                                    <a href="/register">
                                        <span className="mr-2">👤</span>
                                        Daftar Akun Baru
                                    </a>
                                </Button>
                            )}
                        </div>
                    </div>

                    {/* Features Grid */}
                    <div className="mb-16">
                        <div className="text-center mb-12">
                            <h2 className="text-3xl font-bold text-gray-900 mb-4">
                                🎯 Fitur Utama SIMADAM
                            </h2>
                            <p className="text-lg text-gray-600 max-w-2xl mx-auto">
                                Solusi lengkap untuk semua kebutuhan administrasi dan manajemen madrasah Anda
                            </p>
                        </div>

                        <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                            {features.map((feature, index) => (
                                <Card key={index} className="hover:shadow-lg transition-shadow duration-300 border-0 bg-white/70 backdrop-blur-sm">
                                    <CardHeader className="text-center pb-3">
                                        <div className="text-4xl mb-2">{feature.icon}</div>
                                        <CardTitle className="text-lg text-gray-900">{feature.title}</CardTitle>
                                    </CardHeader>
                                    <CardContent>
                                        <CardDescription className="text-center text-gray-600 text-sm">
                                            {feature.description}
                                        </CardDescription>
                                    </CardContent>
                                </Card>
                            ))}
                        </div>
                    </div>

                    {/* Benefits Section */}
                    <div className="text-center mb-16">
                        <h2 className="text-3xl font-bold text-gray-900 mb-8">
                            ⭐ Mengapa Memilih SIMADAM?
                        </h2>
                        
                        <div className="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                            <div className="bg-white/70 backdrop-blur-sm rounded-lg p-6 shadow-sm">
                                <div className="text-3xl mb-4">⚡</div>
                                <h3 className="text-xl font-semibold text-gray-900 mb-3">Efisien & Cepat</h3>
                                <p className="text-gray-600">Otomatisasi proses administrasi menghemat waktu dan tenaga</p>
                            </div>
                            
                            <div className="bg-white/70 backdrop-blur-sm rounded-lg p-6 shadow-sm">
                                <div className="text-3xl mb-4">🔒</div>
                                <h3 className="text-xl font-semibold text-gray-900 mb-3">Aman & Terpercaya</h3>
                                <p className="text-gray-600">Data madrasah tersimpan aman dengan sistem keamanan berlapis</p>
                            </div>
                            
                            <div className="bg-white/70 backdrop-blur-sm rounded-lg p-6 shadow-sm">
                                <div className="text-3xl mb-4">📱</div>
                                <h3 className="text-xl font-semibold text-gray-900 mb-3">Responsif & Modern</h3>
                                <p className="text-gray-600">Dapat diakses dari berbagai perangkat dengan antarmuka yang modern</p>
                            </div>
                        </div>
                    </div>

                    {/* CTA Section */}
                    <div className="text-center bg-gradient-to-r from-green-600 to-blue-600 rounded-2xl p-12 text-white">
                        <h2 className="text-3xl font-bold mb-4">
                            🚀 Siap Memulai Transformasi Digital?
                        </h2>
                        <p className="text-xl mb-8 opacity-90">
                            Bergabunglah dengan madrasah-madrasah modern yang telah menggunakan SIMADAM
                        </p>
                        <div className="flex flex-col sm:flex-row items-center justify-center gap-4">
                            {canLogin && (
                                <Button size="lg" variant="secondary" className="px-8 py-3 text-lg" asChild>
                                    <a href="/login">
                                        <span className="mr-2">🎯</span>
                                        Mulai Sekarang
                                    </a>
                                </Button>
                            )}
                            {canRegister && (
                                <Button size="lg" variant="outline" className="px-8 py-3 text-lg border-white text-white hover:bg-white hover:text-green-600" asChild>
                                    <a href="/register">
                                        <span className="mr-2">✨</span>
                                        Daftar Gratis
                                    </a>
                                </Button>
                            )}
                        </div>
                    </div>
                </main>

                {/* Footer */}
                <footer className="bg-gray-900 text-white py-12 mt-20">
                    <div className="container mx-auto px-4 text-center">
                        <div className="flex items-center justify-center space-x-4 mb-6">
                            <div className="w-12 h-12 bg-gradient-to-br from-green-500 to-blue-600 rounded-lg flex items-center justify-center">
                                <span className="text-white text-xl font-bold">🏫</span>
                            </div>
                            <div>
                                <h3 className="text-xl font-bold">SIMADAM</h3>
                                <p className="text-sm text-gray-400">MA Darul Muttaqien</p>
                            </div>
                        </div>
                        <p className="text-gray-400 mb-4">
                            Sistem Informasi Manajemen Madrasah - Solusi digital untuk kemajuan pendidikan Islam
                        </p>
                        <p className="text-sm text-gray-500">
                            © 2024 SIMADAM. Dikembangkan dengan ❤️ untuk kemajuan madrasah Indonesia.
                        </p>
                    </div>
                </footer>
            </div>

            <style>{`
                @keyframes blob {
                    0% { transform: translate(0px, 0px) scale(1); }
                    33% { transform: translate(30px, -50px) scale(1.1); }
                    66% { transform: translate(-20px, 20px) scale(0.9); }
                    100% { transform: translate(0px, 0px) scale(1); }
                }
                
                @keyframes float {
                    0%, 100% { transform: translateY(0px); }
                    50% { transform: translateY(-10px); }
                }
                
                @keyframes marquee {
                    0% { transform: translateX(100%); }
                    100% { transform: translateX(-100%); }
                }
                
                .animate-blob {
                    animation: blob 7s infinite;
                }
                
                .animate-float {
                    animation: float 3s ease-in-out infinite;
                }
                
                .animate-marquee {
                    animation: marquee 30s linear infinite;
                }
                
                .animation-delay-2000 {
                    animation-delay: 2s;
                }
                
                .animation-delay-4000 {
                    animation-delay: 4s;
                }
                
                .animation-delay-1000 {
                    animation-delay: 1s;
                }
                
                .animation-delay-3000 {
                    animation-delay: 3s;
                }
                
                .animation-delay-5000 {
                    animation-delay: 5s;
                }
            `}</style>
        </div>
    );
}