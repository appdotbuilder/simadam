import { NavFooter } from '@/components/nav-footer';
import { NavMain } from '@/components/nav-main';
import { NavUser } from '@/components/nav-user';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/react';
import { BookOpen, CreditCard, FileText, FolderOpen, GraduationCap, Home, LayoutGrid, School, Settings, Users, UsersRound, FileBarChart, IdCard, UserCheck } from 'lucide-react';

const mainNavItems: NavItem[] = [
    {
        title: 'Beranda',
        href: '/dashboard',
        icon: Home,
    },
    {
        title: 'Profil Madrasah',
        href: '/profil',
        icon: School,
    },
    {
        title: 'Data Siswa',
        href: '/siswa',
        icon: Users,
    },
    {
        title: 'Pembayaran SPP',
        href: '/pembayaran',
        icon: CreditCard,
    },
    {
        title: 'Data Guru',
        href: '/guru',
        icon: UsersRound,
    },
    {
        title: 'Wali Kelas',
        href: '/wali-kelas',
        icon: UserCheck,
    },
    {
        title: 'Surat Keluar Masuk',
        href: '/surat',
        icon: FileText,
    },
    {
        title: 'Pengambilan Ijazah',
        href: '/ijazah',
        icon: GraduationCap,
    },
    {
        title: 'Penempatan Kelas',
        href: '/penempatan-kelas',
        icon: LayoutGrid,
    },
    {
        title: 'Surat Mutasi',
        href: '/mutasi',
        icon: FileBarChart,
    },
    {
        title: 'Kartu Pelajar',
        href: '/kartu-pelajar',
        icon: IdCard,
    },
    {
        title: 'Pengaturan Background',
        href: '/background-settings',
        icon: Settings,
    },
];

const footerNavItems: NavItem[] = [
    {
        title: 'Sistem SIMADAM',
        href: '/',
        icon: FolderOpen,
    },
    {
        title: 'Panduan Penggunaan',
        href: '#',
        icon: BookOpen,
    },
];

export function AppSidebar() {
    return (
        <Sidebar collapsible="icon" variant="inset">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton size="lg" asChild>
                            <Link href="/dashboard" prefetch>
                                <div className="flex items-center gap-3">
                                    <div className="w-8 h-8 bg-gradient-to-br from-green-500 to-blue-600 rounded-lg flex items-center justify-center">
                                        <span className="text-white text-lg font-bold">🏫</span>
                                    </div>
                                    <div>
                                        <div className="font-bold text-sm">SIMADAM</div>
                                        <div className="text-xs text-muted-foreground">MA Darul Muttaqien</div>
                                    </div>
                                </div>
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>

            <SidebarContent>
                <NavMain items={mainNavItems} />
            </SidebarContent>

            <SidebarFooter>
                <NavFooter items={footerNavItems} className="mt-auto" />
                <NavUser />
            </SidebarFooter>
        </Sidebar>
    );
}
