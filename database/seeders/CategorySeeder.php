<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ["ABSENSI","AUTOUPD","BERITAACARA","BPJS","CALLREACTOR","CEKSPEK","FILETOKO","FTPTOKO","GAMEONLINE","GIFTCARD","IDMADVANCED","IDMCARIVIRTUAL","IDMCLASSCON","IDMEDC","IDMFUNGSI","IDMINFOTOKO","IDMLISTRIK","IDMNOMINAL","IDMPAYMENT","IDMPAYMENTPOINT","IDMPULSA","IDMREACTOR","IDMREPORT","IDMTRANSISI","IKIOSK","IKIOSKCMS","IPAKET","ISTOREMONITORING","KARDUS","LAIN","LISTRIK","MINIUPDATER","MYSQLADMIN","PAYMENTPOINT","PDAM","POS2","POSBPB","POSIDM","POSIDMMODUL","POSMAIN","POSNET","POSPERMINTAAN","POSPRODUKSI","POSREALTIME","POSRETUR","POSUTIL","POSVIEWTOKO","PRICETAG","PRODUCTRETURN","PULSA","RETURSALES","REVERSAL","ROLITE","RRAK","SCANFINGER","SO","SONAS","STRUKONLINE","SYSMENU","TARIKWS","TCASH","TICKETING","UPDVERSIOL","VOUCHERPREPAID","WDCP","WHITELISTPLU","Program Closing Bulanan","Program Closing Shift/Input Aktual Kas","Program BKL/RKL/NPD","Program POS Kasir","Program POSMAIN","Program Closing Harian","Program Initial (inisial)","Prodmast","Program Stock","Program Absen Toko","Program ( NPB / NPX / NPR / NPG )","Program I-Pulsa","Program Price Tag / Monitoring Price Tag","Program SO","Pesanan Transaksi APKA","Tanggal Pesanan Expired Tidak Ditemukan","Program PJR (Penanggung Jawab Rak) Toko","Program RRAK","Alat Pembayaran","Status Pesanan Unbooking","Program Transfer Antar Toko (TAT)","Program PLN","Pesanan Belum Masuk Toko","I-Kiosk","Penerimaan Barang Item DKL/Direct Shipme","Pesanan Transaksi Grabmart","Program SQL Admin","Status Booking Tidak Hilang","Program ATK","Stock Toko Tidak Sinkron Dengan Pesanan","Program Payment Point/PDAM/BPJS","Program Surat Jalan Kardus","Program Game Online / Unipin","Program Tiketing","Program Absen Kendaraan","Program Sewa Teras"];

        foreach ($data as $value) {
            Category::create([
                'name' => strtoupper($value)
            ]);
        }
    }
}
