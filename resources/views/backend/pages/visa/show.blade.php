<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Electronic Visa - State of Kuwait</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/visa/visa-global.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/visa/visa-style.css') }}" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <style>
    @font-face {
    font-family: "Area Variable-ExtraBold";
    /* Area Variable-ExtraBold */
    src: url("../../../fonts/Area-Extrabold.otf") format("opentype");
}
@font-face {
    font-family: "Area Variable-NormalBold";
    /* Area Variable-ExtraBold */
    src: url("../../../fonts/Area-Black.otf") format("opentype");
}
@font-face {
    font-family: "Area Variable-ExtendedBold";
    /* Area Variable-ExtraBold */
    src: url("../../../fonts/Area-BoldExtended.otf") format("opentype");
}
@font-face {
    font-family: "OCR-B-Letterpress-M-OT";
    src: url("../../../fonts/OCR-B-Letterpress-M-OT.otf") format("opentype");
}

/* ocr-b-regular.ttf */
@font-face {
    font-family: "OCR-B-Regular";
    src: url("../../../fonts/ocr-b-regular.ttf") format("truetype");
}
@font-face {
    font-family: "Jali Arabic-Light";
    src: url("../../../fonts/Jali Arabic Light.ttf") format("opentype");
}
@font-face {
    font-family: "Jali Arabic-Medium";
    src: url("../../../fonts/Jali Arabic Medium.ttf") format("opentype");
}
/* Jali Arabic-Bold */
@font-face {
    font-family: "Jali Arabic-Bold";
    src: url("../../../fonts/Jali Arabic Bold.ttf") format("opentype");
}
@font-face {
    font-family: "Area Variable-SemiBold";
    src: url("../../../fonts/Area-Semibold.otf") format("opentype");
}

/* Jali Arabic-SemiBold */
@font-face {
    font-family: "Jali Arabic-SemiBold";
    src: url("../../../fonts/Jali Arabic SemiBold.ttf") format("opentype");
}

/* Jali Arabic-ExtraBold */
@font-face {
    font-family: "Jali Arabic-ExtraBold";
    src: url("../../../fonts/Jali Arabic ExtraBold.ttf") format("opentype");
}

/* Jali Latin Variable Trial-SemiBold */
@font-face {
    font-family: "Jali Latin Variable Trial-SemiBold";
    src: url("../../../fonts/JaliLatin-SemiBold.Trial-BF6569377f1e352.ttf")
        format("truetype");
}
@font-face {
    font-family: "Iras ITC Bold";
    src: url("../../../fonts/eras-itc-bold.ttf") format("truetype");
}

@media print {
    @page {
        size: A4;
        margin: 0;
    }

    body {
        margin: 0;
    }

    .main-file {
        width: 210mm;
        height: 297mm;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }
}

.main-file {
    background-color: #ffffff;
    display: flex;
    flex-direction: row;
    justify-content: center;
    width: 100%;
}

.main-file .paper {
    background-color: #ffffff;
    overflow: hidden;
    width: 794px;
    height: 1141px;
    position: relative;
}
.main-file .group {
    position: absolute;
    width: 818px;
    height: 153px;
    top: 8px;
    left: -12px;
}

.main-file .overlap-group {
    position: absolute;
    width: 816px;
    height: 150px;
    top: 9px;
    left: 12px;
    background-size: 100% 100%;
}

.main-file .logo-en {
    position: absolute;
    width: auto;
    height: 63px;
    top: 40px;
    left: 506px;
}

.main-file .img {
    position: absolute;
    width: auto;
    height: 63px;
    top: 40px;
    left: 225px;
}

.main-file .logo-en-2 {
    position: absolute;
    width: auto;
    height: 76px;
    top: 36px;
    left: 360px;
}

.main-file .text-wrapper {
    top: 72px;
    left: 642px;
    font-family: "Area Variable-NormalBold";
    font-weight: 900;
    color: #313a46;
    font-size: 18px;
    position: absolute;
    direction: rtl;
}

.main-file .group-2 {
    position: absolute;
    width: 770px;
    height: 9px;
    top: 140px;
    left: 10px;
}

.main-file .image {
    /* height: 22px; */
    top: 53px;
    left: 30px;
    position: absolute;
    /* width: 185px; */
    font-family: "Iras ITC Bold";
    color: #21428f;
    letter-spacing: -1px;
    font-size: 17px;
}

.main-file .image-2 {
    top: 79px;
    left: 55px;
    position: absolute;
    font-family: "Iras ITC Bold";
    color: #4a5566;
    font-size: 14px;
}

.main-file .ece-cc-ef {
    position: absolute;
    width: 144px;
    height: 24px;
    top: 56px;
    left: 621px;
    object-fit: cover;
}

.main-file .rectangle {
    position: absolute;
    width: 794px;
    height: 4px;
    top: 160px;
    left: 12px;
    background-color: #8396b1;
}

.main-file .overlap-wrapper {
    position: absolute;
    width: 754px;
    height: 359px;
    top: 724px;
    left: 20px;
}

.main-file .overlap {
    position: relative;
    width: 756px;
    height: 360px;
    /* top: -1px; */
    /* left: -1px; */
}

.main-file .rectangle-2 {
    position: absolute;
    width: 722px;
    height: 330px;
    top: 0px;
    left: 18px;
    background-color: #f4fbfe;
    border-radius: 7px;
    border: 1px solid;
    border-color: #888887;
}

.main-file .group-3 {
    position: absolute;
    width: 754px;
    height: 359px;
    top: 0;
    left: 1px;
}

.main-file .group-wrapper {
    position: absolute;
    width: 754px;
    height: 300px;
    top: 0;
    left: 0;
}

.main-file .group-4 {
    position: relative;
    height: 300px;
}

.main-file .overlap-2 {
    position: absolute;
    width: 754px;
    height: 279px;
    top: 1px;
    left: 0;
}

.main-file .rectangle-3 {
    position: absolute;
    width: 720px;
    height: 25px;
    top: 0px;
    left: 18.5px;
    /* right: 0.5px; */
    background-color: #dae0ea;
    border-radius: 6px 6px 0px 0px;
    border-bottom: 1px solid #888887;
}

.main-file .rectangle-4 {
    position: absolute;
    width: 754px;
    height: 1px;
    top: 24px;
    left: 0;
    background-color: #b3bac5;
}

.main-file .rectangle-5 {
    position: absolute;
    width: 698px;
    height: 0.5px;
    top: 48px;
    left: 28px;
    background-color: #e9edf0;
}

.main-file .rectangle-6 {
    position: absolute;
    width: 698px;
    height: 0.5px;
    top: 76px;
    left: 28px;
    background-color: #e9edf0;
}

.main-file .rectangle-7 {
    position: absolute;
    width: 698px;
    height: 0.5px;
    top: 105px;
    left: 28px;
    background-color: #e9edf0;
}

.main-file .rectangle-8 {
    position: absolute;
    width: 698px;
    height: 0.5px;
    top: 133px;
    left: 28px;
    background-color: #e9edf0;
}

.main-file .rectangle-9 {
    position: absolute;
    width: 720px;
    height: 0.5px;
    top: 162px;
    left: 18px;
    background-color: #babdc6;
}

.main-file .group-5 {
    position: absolute;
    width: 717px;
    height: 275px;
    top: 4px;
    left: 20px;
}

.text-wrapper-2 {
    position: absolute;
    top: -2px;
    left: 20px;
    font-family: "Jali Arabic-SemiBold";
    color: #444755;
    font-size: 12px;
    letter-spacing: 0;
    line-height: normal;
    font-weight: bold;
}

.main-file .text-wrapper-3 {
    top: -2px;
    left: 609px;
    font-family: "Jali Arabic-SemiBold";
    color: #444755;
    font-size: 12px;
    text-align: left;
    letter-spacing: 0;
    position: absolute;
    line-height: normal;
    direction: rtl;
    line-height: normal;
    font-weight: bold;
}

.main-file .overlap-group-wrapper {
    position: absolute;
    width: 190px;
    height: 94px;
    top: 178px;
    left: -1px;
}

.main-file .overlap-group-2 {
    position: relative;
    width: 180px;
    height: 90px;
    top: 1px;
    left: 20px;
    background-color: #ffffff;
    border-radius: 6px;
    border: 1px solid;
    border-color: #888887;
}

.main-file .text-wrapper-4 {
    position: absolute;
    top: 0px;
    left: 6px;
    font-family: "Jali Arabic-Medium";
    /* font-weight: 400; */
    color: #48535c;
    font-size: 12px;
    letter-spacing: -0.25px;
    line-height: normal;
    white-space: nowrap;
}

.main-file .text-wrapper-5 {
    top: 0px;
    left: 136px;
    font-family: "Jali Arabic-Medium";
    /* font-weight: 400; */
    color: #48535c;
    font-size: 12px;
    letter-spacing: 0;
    white-space: nowrap;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .image-3 {
    position: absolute;
    width: 60px;
    height: 56px;
    top: 22px;
    left: 66px;
}

.main-file .div-wrapper {
    position: absolute;
    width: 190px;
    height: 90px;
    top: 182px;
    left: 270px;
}

.main-file .text-wrapper-6 {
    position: absolute;
    top: 0px;
    left: 6px;
    font-family: "Jali Arabic-Medium";
    /* font-weight: 400; */
    color: #48535c;
    font-size: 12px;
    letter-spacing: 0;
    line-height: normal;
}

.main-file .text-wrapper-7 {
    top: 0px;
    left: 120px;
    font-family: "Jali Arabic-Medium";
    /* font-weight: 400; */
    color: #48535c;
    font-size: 12px;
    letter-spacing: 0;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .group-6 {
    position: absolute;
    width: 191px;
    height: 94px;
    top: 185px;
    left: 546px;
}

.main-file .overlap-3 {
    position: relative;
    width: 189px;
    height: 90px;
    top: -4px;
    left: -15px;
    background-color: #ffffff;
    border-radius: 6px;
    border: 1px solid;
    border-color: #888887;
}

.main-file .text-wrapper-8 {
    position: absolute;
    top: 0px;
    left: 7px;
    font-family: "Jali Arabic-Medium";
    /* font-weight: 400; */
    color: #48535c;
    font-size: 12px;
    letter-spacing: 0;
    line-height: normal;
}

.main-file .text-wrapper-9 {
    top: 0px;
    left: 119px;
    font-family: "Jali Arabic-Medium";
    /* font-weight: 400; */
    color: #48535c;
    font-size: 12px;
    letter-spacing: 0;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .rectangle-10 {
    position: absolute;
    width: 722px;
    height: 1px;
    top: 290px;
    left: 17px;
    background-color: #babdc6;
}

.main-file .group-7 {
    position: absolute;
    width: 518px;
    height: 7px;
    top: 346px;
    left: 116px;
}

.main-file .ministry-of-interior {
    position: absolute;
    top: -8px;
    left: 0;
    font-family: "Jali Arabic-SemiBold";
    font-weight: 600;
    color: #949eaf;
    font-size: 10.4px;
    letter-spacing: -0.02px;
    line-height: normal;
    white-space: nowrap;
}
.main-file .element {
    top: -9px;
    left: 272px;
    font-family: "Jali Arabic-SemiBold";
    /* font-weight: 600; */
    color: #949eaf;
    font-size: 10.9px;
    white-space: nowrap;
    position: absolute;
}

.main-file .group-8 {
    position: absolute;
    width: 588px;
    height: 8px;
    top: 303px;
    left: 139px;
}

.main-file .p {
    top: 0px;
    left: 350px;
    font-family: "Jali Arabic-SemiBold";
    font-weight: 500;
    color: #5b5d64;
    font-size: 10px;
    letter-spacing: -0.1px;
    white-space: nowrap;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .use-ministry-of {
    position: absolute;
    top: 0px;
    left: 20px;
    font-family: "Jali Latin Variable Trial-SemiBold";
    font-weight: 500;
    color: #5b5d64;
    font-size: 10px;
    letter-spacing: 0;
    line-height: normal;
    white-space: nowrap;
}

.main-file .unnamed-removebg {
    position: absolute;
    width: auto;
    height: 27px;
    top: 295px;
    left: 70px;
    object-fit: cover;
}

.main-file .element-2 {
    position: absolute;
    width: auto;
    height: 46px;
    top: 288px;
    left: 95px;
}

.main-file .unnamed {
    position: absolute;
    width: 32px;
    height: 32px;
    top: 293px;
    left: 30px;
    object-fit: cover;
}

.main-file .overlap-4 {
    position: absolute;
    width: 754px;
    height: 552px;
    top: 185px;
    left: 20px;
    border-radius: 7px;
}

.main-file .group-9 {
    position: absolute;
    width: 568px;
    height: 429px;
    top: 38px;
    left: 94px;
}

.main-file .overlap-5 {
    position: relative;
    width: 560px;
    height: 411px;
    top: 12px;
    /* left: -1px; */
    background-color: #ededed;
    border-radius: 7px;
    border: 1px solid;
    border-color: #888887;
}

.main-file .mask-group {
    position: absolute;
    width: 560px;
    height: 407px;
    top: 0px;
    left: 0;
}

.main-file .group-10 {
    position: absolute;
    width: 62px;
    height: 35px;
    top: 146px;
    left: 318px;
}

.main-file .overlap-group-3 {
    position: relative;
    width: 58px;
    height: 35px;
}

.main-file .text-wrapper-10 {
    top: 15px;
    left: 0;
    font-family: "Jali Arabic-SemiBold";
    font-weight: 600;
    color: #000000;
    font-size: 14px;
    letter-spacing: 0;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .text-wrapper-11 {
    top: 0;
    left: 20px;
    font-family: "Jali Arabic-SemiBold";
    font-weight: 600;
    color: #1b3694;
    font-size: 11px;
    letter-spacing: 0;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .STATE-KUWAIT {
    position: absolute;
    width: 199px;
    height: 9px;
    top: 25px;
    left: 14px;
}

.main-file .text-wrapper-12 {
    top: 17px;
    left: 0px;
    right: 15px;
    font-family: "Jali Arabic-ExtraBold";
    font-weight: 800;
    color: #203ea7;
    font-size: 17px;
    letter-spacing: 0.34px;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .text-wrapper-13 {
    top: 21px;
    left: 359px;
    font-family: "Jali Arabic-ExtraBold";
    font-weight: 800;
    color: #203ea7;
    font-size: 12.5px;
    letter-spacing: 0.25px;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .group-11 {
    position: absolute;
    width: 92px;
    height: 172px;
    top: 175px;
    left: 22px;
}

.main-file .image-4 {
    position: absolute;
    width: 80px;
    height: 77px;
    top: 100px;
    left: 0;
}

.main-file .overlap-6 {
    position: absolute;
    width: 75px;
    height: 35px;
    top: 17px;
    left: 10px;
}

.main-file .text-wrapper-14 {
    position: absolute;
    top: 6px;
    left: 0;
    font-family: "Jali Arabic-Bold";
    font-weight: 900;
    color: #203ea7;
    font-size: 12px;
    letter-spacing: 0;
    line-height: normal;
}

.main-file .text-wrapper-15 {
    position: absolute;
    top: 20px;
    left: 2px;
    font-family: "Jali Arabic-SemiBold";
    color: #121619;
    font-size: 14px;
    letter-spacing: 0;
    line-height: normal;
}

.main-file .text-wrapper-16 {
    top: 10px;
    left: 16px;
    font-family: "Area Variable-SemiBold";
    font-weight: 600;
    color: #203ea7;
    font-size: 11.8px;
    text-align: left;
    letter-spacing: 0;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .text-wrapper-17 {
    position: absolute;
    top: 71px;
    left: 16px;
    font-family: "Jali Arabic-Light";
    font-weight: 1000;
    color: #121619;
    font-size: 11.4px;
    letter-spacing: 0;
    line-height: normal;
    white-space: nowrap;
}

.main-file .text-wrapper-18 {
    top: 82px;
    left: 16px;
    font-family: "Jali Arabic-Light";
    font-weight: 1000;
    font-size: 11.4px;
    white-space: nowrap;
    position: absolute;
    color: #121619;
    letter-spacing: 0;
    line-height: normal;
}

.main-file .text-wrapper-19 {
    top: 52px;
    left: 32px;
    font-family: "Jali Arabic-SemiBold";
    font-weight: 600;
    color: #000000;
    font-size: 14px;
    text-align: left;
    letter-spacing: 0;
    white-space: nowrap;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .group-12 {
    position: absolute;
    width: 136px;
    height: 37px;
    top: 60px;
    left: 411px;
}

.main-file .text-wrapper-20 {
    top: 2px;
    letter-spacing: 0;
    position: absolute;
    left: -12px;
    font-family: "Area Variable-NormalBold";
    font-weight: 800;
    color: #2d47a3;
    font-size: 10px;
    line-height: normal;
}

.main-file .text-wrapper-21 {
    top: -1px;
    left: 67px;
    font-family: "Area Variable-NormalBold";
    font-weight: 800;
    color: #203ea7;
    font-size: 13px;
    letter-spacing: 0;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .text-wrapper-22 {
    position: absolute;
    top: 17px;
    left: 75px;
    font-family: "Jali Arabic-SemiBold";
    font-weight: 900;
    color: #121619;
    font-size: 13px;
    text-align: right;
    letter-spacing: 0;
    line-height: normal;
}

.main-file .group-13 {
    position: absolute;
    width: 520px;
    height: 45px;
    top: 362px;
    left: 22px;
}

.main-file .overlap-7 {
    position: relative;
    height: 45px;
    right: 5px;
}

.main-file .group-14 {
    position: absolute;
    width: 520px;
    height: 24px;
    top: 0;
    left: -1px;
}

.main-file .overlap-group-4 {
    position: absolute;
    width: 312px;
    height: 24px;
    top: 0;
    left: 0;
}

.main-file .VBKWTALI-ABDUL-MAZID {
    position: absolute;
    top: 0;
    /* left: 0; */
    font-family: "OCR-B-Letterpress-M-OT";
    font-weight: 300;
    color: #121619;
    font-size: 19.5px;
    letter-spacing: 0;
    line-height: normal;
}

.main-file .vector {
    position: absolute;
    width: 9px;
    height: 12px;
    top: 6px;
    left: 243px;
}

.main-file .vector-2 {
    left: 95px;
    position: absolute;
    width: 9px;
    height: 12px;
    top: 6px;
}

.main-file .vector-3 {
    left: 105px;
    position: absolute;
    width: 9px;
    height: 12px;
    top: 6px;
}

.main-file .vector-4 {
    left: 175px;
    position: absolute;
    width: 9px;
    height: 12px;
    top: 6px;
}

.main-file .group-15 {
    position: absolute;
    width: 206px;
    height: 12px;
    top: 6px;
    left: 313px;
}

.main-file .div-2 {
    position: absolute;
    top: 21px;
    left: 2px;
    font-family: "OCR-B-Regular";
    /* font-weight: 400; */
    color: #121619;
    font-size: 19.5px;
    line-height: normal;
}

.main-file .span-2 {
    /* letter-spacing: 0; */
    font-size: 19.5px;
    font-family: "OCR-B-Letterpress-M-OT";
}


.main-file .text-wrapper-23 {
    letter-spacing: 0.23px;
}

.main-file .text-wrapper-24 {
    letter-spacing: 0.15px;
}

.main-file .group-16 {
    position: absolute;
    width: 90px;
    height: 12px;
    top: 23px;
    left: 427px;
}

.main-file .text-wrapper-25 {
    top: 304px;
    left: 521px;
    font-family: "Jali Arabic-Bold";
    color: #203ea7;
    font-size: 10px;
    letter-spacing: 0;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .text-wrapper-26 {
    top: 318px;
    /* left: 286px; */
    font-family: "Jali Arabic-Bold";
    font-weight: 900;
    color: #000000;
    font-size: 13px;
    position: absolute;
    direction: rtl;
    width: 340px;
    left: 205px;
}

.main-file .group-17 {
    position: absolute;
    width: 158px;
    height: 50px;
    top: 187px;
    left: 394px;
}

.main-file .ABDUL-MAZID-AFSAR {
    position: absolute;
    width: 200px;
    top: 36px;
    left: -47px;
    font-family: "Jali Latin Variable Trial-SemiBold";
    font-weight: 900;
    color: #121619;
    font-size: 14.4px;
    text-align: right;
    line-height: normal;
}

.main-file .text-wrapper-27 {
    letter-spacing: -0.04px;
}

.main-file .div-3 {
    /* top: 17px;
    left: 36px;
    font-family: "Jali Arabic-Bold";
    font-weight: 900;
    color: #121619;
    font-size: 14px;
    white-space: nowrap;
    position: absolute;
    direction: rtl; */

    
    width: 200px;
    top: 17px;
    left: -50px;
    font-family: "Jali Arabic-Bold";
    font-weight: 900;
    color: #121619;
    font-size: 14px;
    text-align: right;
    line-height: normal;
    white-space: nowrap;
    position: absolute;
    direction: rtl;
}

.main-file .text-wrapper-28 {
    font-family: "Jali Arabic-Bold";
    font-size: 14px;
}

.main-file .text-wrapper-29 {
    letter-spacing: 0.1px;
}

.main-file .text-wrapper-30 {
    position: absolute;
    width: 38px;
    top: 5px;
    left: 90px;
    font-family: "Area Variable-NormalBold";
    font-weight: 800;
    color: #203ea7;
    font-size: 10px;
    letter-spacing: 0;
    line-height: normal;
    white-space: nowrap;
}

.main-file .text-wrapper-31 {
    width: 27px;
    top: 2px;
    left: 125px;
    font-family: "Jali Arabic-Bold";
    font-weight: 900;
    color: #203ea7;
    font-size: 12px;
    letter-spacing: 0;
    white-space: nowrap;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .group-18 {
    position: absolute;
    width: 125px;
    height: 38px;
    top: 254px;
    left: 430px;
}

.main-file .text-wrapper-32 {
    position: absolute;
    top: 1px;
    left: 0px;
    font-family: "Area Variable-NormalBold";
    font-weight: 600;
    color: #203ea7;
    font-size: 10px;
    letter-spacing: 0;
    line-height: normal;
}

.main-file .text-wrapper-33 {
    top: 0;
    left: 58px;
    font-family: "Area Variable-NormalBold";
    font-weight: 800;
    color: #203ea7;
    font-size: 12px;
    letter-spacing: 0;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .text-wrapper-34 {
    top: 18px;
    left: 51px;
    font-family: "Jali Arabic-SemiBold";
    font-weight: 900;
    font-size: 14px;
    text-align: right;
    position: absolute;
    color: #121619;
    letter-spacing: 0;
    line-height: normal;
}

.main-file .group-19 {
    position: absolute;
    width: 120px;
    height: 40px;
    top: 145px;
    left: 431px;
}

.main-file .text-wrapper-35 {
    position: absolute;
    top: 1px;
    left: 3px;
    font-family: "Area Variable-NormalBold";
    font-weight: 800;
    color: #203ea7;
    font-size: 10px;
    letter-spacing: 0;
}

.main-file .div-4 {
    top: 1px;
    left: 62px;
    font-family: "Area Variable-NormalBold";
    font-weight: 400;
    color: #203ea7;
    font-size: 12.5px;
    letter-spacing: 0;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .text-wrapper-36 {
    font-weight: 800;
}

.main-file .text-wrapper-37 {
    font-family: "Calibri-Bold";
    font-weight: 700;
}

.main-file .text-wrapper-38 {
    position: absolute;
    top: 19px;
    left: 57px;
    font-family: "Jali Arabic-SemiBold";
    /* font-weight: 900; */
    color: #000000;
    font-size: 13px;
    text-align: right;
    letter-spacing: 0;
    line-height: normal;
}

.main-file .group-20 {
    position: absolute;
    width: 131px;
    height: 38px;
    top: 108px;
    left: 424px;
}

.main-file .text-wrapper-39 {
    position: absolute;
    top: 2px;
    left: -6px;
    font-family: "Area Variable-NormalBold";
    font-weight: 900;
    color: #1c3798;
    font-size: 10px;
    letter-spacing: 0;
    line-height: normal;
}

.main-file .text-wrapper-40 {
    top: 0;
    left: 51px;
    font-family: "Area Variable-NormalBold";
    font-weight: 800;
    color: #203ea7;
    font-size: 12px;
    letter-spacing: 0;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .text-wrapper-41 {
    top: 15px;
    left: 60px;
    font-family: "Jali Arabic-SemiBold";
    /* font-weight: 900; */
    font-size: 13px;
    text-align: right;
    position: absolute;
    color: #121619;
    letter-spacing: 0;
    line-height: normal;
}

.main-file .group-21 {
    position: absolute;
    width: 165px;
    height: 263px;
    top: 59px;
    left: 138px;
}

.main-file .text-wrapper-42 {
    top: 3px;
    letter-spacing: 0.1px;
    white-space: nowrap;
    position: absolute;
    left: 0;
    font-family: "Area Variable-NormalBold";
    font-weight: 900;
    color: #1e399a;
    font-size: 10px;
    line-height: normal;
}

.main-file .text-wrapper-43 {
    top: 2px;
    left: 53px;
    font-family: "Area Variable-SemiBold";
    font-weight: 600;
    color: #203ea7;
    font-size: 11.2px;
    text-align: left;
    letter-spacing: 0;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .text-wrapper-44 {
    position: absolute;
    top: 48px;
    left: 2px;
    font-family: "Area Variable-NormalBold";
    font-weight: 800;
    color: #203ea7;
    font-size: 10px;
    letter-spacing: 0;
    line-height: normal;
}

.main-file .text-wrapper-45 {
    top: 47px;
    left: 68px;
    font-family: "Area Variable-SemiBold";
    font-weight: 600;
    color: #203ea7;
    font-size: 11px;
    text-align: left;
    letter-spacing: 0;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .text-wrapper-46 {
    top: 60px;
    left: 2px;
    font-family: "Jali Arabic-SemiBold";
    /* font-weight: 900; */
    font-size: 13px;
    position: absolute;
    color: #121619;
    letter-spacing: 0;
    line-height: normal;
}

.main-file .text-wrapper-47 {
    position: absolute;
    top: 88px;
    left: 2px;
    font-family: "Area Variable-NormalBold";
    font-weight: 900;
    color: #203ea7;
    font-size: 10px;
    letter-spacing: 0;
    line-height: normal;
    white-space: nowrap;
}

.main-file .overlap-8 {
    position: absolute;
    width: 18px;
    height: 30px;
    top: 140px;
    left: 1px;
}

.main-file .text-wrapper-48 {
    position: absolute;
    top: -8px;
    left: 0;
    font-family: "Jali Arabic-NormalBold";
    font-weight: 900;
    color: #203ea7;
    font-size: 10px;
    letter-spacing: 0;
    line-height: normal;
}

.main-file .text-wrapper-49 {
    position: absolute;
    top: 5px;
    left: 1px;
    font-family: "Jali Latin Variable Trial-SemiBold";
    font-weight: 700;
    color: #121619;
    font-size: 13px;
    letter-spacing: 0;
    line-height: normal;
}

.main-file .overlap-9 {
    position: absolute;
    width: 26px;
    height: 33px;
    top: 140px;
    left: 23px;
}

.main-file .text-wrapper-50 {
    top: -8px;
    left: 2px;
    font-family: "Area Variable-SemiBold";
    font-weight: 600;
    color: #203ea7;
    font-size: 11.3px;
    text-align: left;
    letter-spacing: 0;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .text-wrapper-51 {
    top: 4px;
    left: 6px;
    font-family: "Jali Arabic-Bold";
    font-weight: 900;
    color: #121619;
    font-size: 14px;
    text-align: left;
    letter-spacing: 0;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .text-wrapper-52 {
    position: absolute;
    top: 102px;
    left: 2px;
    font-family: "Jali Latin Variable Trial-SemiBold";
    /* font-weight: 500; */
    color: #121619;
    font-size: 13px;
    letter-spacing: 0;
    line-height: normal;
    white-space: nowrap;
}

.white-logo path {
    /* fill: white; */
  }

.main-file .text-wrapper-53 {
    position: absolute;
    top: 195px;
    left: 1px;
    font-family: "Area Variable-NormalBold";
    font-weight: 800;
    color: #203ea7;
    font-size: 10px;
    letter-spacing: 0;
    line-height: normal;
    white-space: nowrap;
}

.main-file .text-wrapper-54 {
    position: absolute;
    top: 230px;
    left: 2px;
    font-family: "Jali Arabic-Bold";
    font-weight: 900;
    color: #121619;
    font-size: 13px;
    letter-spacing: 0;
    line-height: normal;
}

.main-file .text-wrapper-55 {
    top: 209px;
    left: 2px;
    font-family: "Jali Arabic-Bold";
    font-weight: 900;
    color: #121619;
    font-size: 14px;
    text-align: left;
    letter-spacing: 0;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .text-wrapper-56 {
    top: 195px;
    left: 74px;
    font-family: "Area Variable-NormalBold";
    font-weight: 800;
    color: #203ea7;
    font-size: 12px;
    text-align: left;
    letter-spacing: 0;
    position: absolute;
    line-height: normal;
    direction: rtl;
}

.main-file .group-22 {
    position: absolute;
    width: 138px;
    height: 17px;
    top: 23px;
    left: -21px;
}

.main-file .text-wrapper-57 {
    top: 0;
    /* left: -5px; */
    font-family: "Area Variable-NormalBold";
    font-weight: 600;
    color: #121619;
    font-size: 12px;
    text-align: left;
    letter-spacing: 0;
    position: absolute;
    line-height: normal;
    right: -10px;
    direction: rtl;
    width: 250px;
}

.main-file .group-23 {
    position: absolute;
    width: 2.5px;
    height: 2px;
    top: 7px;
    left: 14px;
    background-color: #121619;
}

.main-file .STATE-f-KUWAIT {
    position: absolute;
    width: 294px;
    height: 20px;
    top: 326px;
    left: 138px;
}

.main-file .rectangle-11 {
    position: absolute;
    width: 722px;
    height: 530px;
    top: -15px;
    left: 16px;
    border-radius: 7px;
    border: 1px solid;
    border-color: #888887;
}
/* Existing CSS code */

/* Add these new styles */
.main-file {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.paper {
    max-width: 794px;
    width: 100%;
    margin: 0 auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.group {
    position: relative;
}

.overlap-group {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.text-wrapper {
    margin-top: 10px;
}

.overlap-wrapper,
.overlap-4 {
    margin-top: 20px;
}

.group-7,
.group-8 {
    /* margin-top: 15px; */
    text-align: center;
}

.group-9 {
    position: relative;
}

.overlap-5 {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
    /* padding: 20px; */
}

.group-10,
.group-11,
.group-12,
.group-13,
.group-17,
.group-18,
.group-19,
.group-20,
.group-21 {
    margin-bottom: 15px;
}

/* Accessibility improvements */
/* .text-wrapper,
.text-wrapper-2,
.text-wrapper-3,
.text-wrapper-4,
.text-wrapper-5,
.text-wrapper-6,
.text-wrapper-7,
.text-wrapper-8,
.text-wrapper-9,
.text-wrapper-12,
.text-wrapper-13 {
    font-weight: bold;
} */

img {
    max-width: 100%;
    height: auto;
}

/* Responsive design */
@media (max-width: 768px) {
    .overlap-5 {
        grid-template-columns: 1fr;
    }
}
.main-file .VBKWTALI-ABDUL-MAZID {
    position: absolute;
    top: 0;
    left: 0;  /* already 0 */
    font-family: "OCR-B-Letterpress-M-OT";
    font-weight: 300;
    color: #121619;
    font-size: 19.5px;
    letter-spacing: 0;
    line-height: normal;
}

.main-file .div-2 {
    position: absolute;
    top: 21px;
    left: 0;  /* change from 2px to 0 */
    font-family: "OCR-B-Regular";
    color: #121619;
    font-size: 19.5px;
    line-height: normal;
    letter-spacing: .5px;
} 
.fixed-width-line {
    width: 45ch;             /* width for 45 characters */
    white-space: nowrap;     /* prevents wrapping */
    overflow: hidden;        /* hide overflow if any */
    text-align: left;        /* left-align text so starting and ending points match */
    margin: 0;
    padding: 0;
}

</style>

</head>

<body style="min-width: 1100px !important;">
    <main class="main-file">
        <div class="paper" id="visa-details">
            <header class="group">
                <div class="overlap-group"
                    style="background-image: url('{{ asset('frontend/assets/visa') }}/img/banner.svg')">
                    <img class="logo-en" src="{{ asset('frontend/assets/visa') }}/img/logo-en 5.png" alt="Logo" />
                    <img class="img" src="{{ asset('frontend/assets/visa') }}/img/logo-en 5.png" alt="Logo" />
                    <img class="logo-en-2" src="{{ asset('frontend/assets/visa') }}/img/emblem.svg" alt="Logo" />
                    <h1 class="text-wrapper">تأشيرة إلكترونية</h1>
                    <img class="group-2" src="{{ asset('frontend/assets/visa') }}/img/Group 24.png"
                        alt="Decorative element" />
                    <!-- <img class="image" src="{{ asset('frontend/assets/visa') }}/img/image 11 (2) 1.png"
                        alt="Decorative image" /> -->
                    <h3 class="image">STATE OF KUWAIT</h3>
                    <!-- <img class="image-2" src="{{ asset('frontend/assets/visa') }}/img/image 11 (2) 2.png"
                        alt="Decorative image" /> -->
                    <h3 class="image-2">Electronic Visa</h3>
                    <img class="ece-cc-ef"
                        src="{{ asset('frontend/assets/visa') }}/img/e11c10e4-9c0c-4ef1-9026-275f3a9c7f1d 3.png"
                        alt="Decorative element" />
                </div>
                <div class="rectangle"></div>
            </header>
            <section class="overlap-wrapper">
                <div class="overlap">
                    <div class="rectangle-2"></div>
                    <div class="group-3">
                        <div class="group-wrapper">
                            <div class="group-4">
                                <div class="overlap-2">
                                    <div class="rectangle-3"></div>
                                    <!-- <div class="rectangle-4"></div> -->
                                    <div class="rectangle-5"></div>
                                    <div class="rectangle-6"></div>
                                    <div class="rectangle-7"></div>
                                    <div class="rectangle-8"></div>
                                    <div class="rectangle-9"></div>
                                    <div class="group-5">
                                        <span class="text-wrapper-2">For Official Use</span>
                                        <span class="text-wrapper-3">للإستعمال الرسمي</span>
                                        <div class="overlap-group-wrapper">
                                            <div class="overlap-group-2">
                                                <h3 class="text-wrapper-4">Instructions</h3>
                                                <h3 class="text-wrapper-5">تعليمات</h3>
                                                <img class="image-3"
                                                    src="{{ asset('frontend/assets/visa') }}/img/image 7.png"
                                                    alt="Instructions icon" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="div-wrapper">
                                        <div class="overlap-group-2">
                                            <h3 class="text-wrapper-6">Exit Stamp</h3>
                                            <h3 class="text-wrapper-7">ختم الخروج</h3>
                                        </div>
                                    </div>
                                    <div class="group-6">
                                        <div class="overlap-3">
                                            <h3 class="text-wrapper-8">Entry Stamp</h3>
                                            <h3 class="text-wrapper-9">ختم الدخول</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="rectangle-10"></div>
                            </div>
                        </div>
                        <footer class="group-7">
                            <p class="ministry-of-interior">
                                Ministry of
                                Interior&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;Electronic
                                Visa&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;Edition 2 - Nov. 2024
                            </p>
                            <p class="element">
                                وزارة الداخلية&nbsp;&nbsp;|&nbsp;&nbsp;تأشيرة
                                إلكترونية&nbsp;&nbsp;|&nbsp;&nbsp;الاصدار رقم 2 نوفمبر
                            </p>
                        </footer>
                        <div class="group-8">
                            <p class="p">
                                استخدم تطبيقات وزارة الداخلية للتحقق من محتوى هذه الوثيقة
                            </p>
                            <p class="use-ministry-of">
                                Use Ministry of Interior&#39;s Apps to verify the content in
                                this document
                            </p>
                        </div>
                        <div class="footer_logo">
                            <img class="unnamed-removebg" src="{{ asset('frontend/assets/visa') }}/img/moilogo.png"
                                alt="QR Code" />
                            <img class="element-2" src="{{ asset('frontend/assets/visa') }}/img/logo-3.png"
                                alt="Barcode" />
                            <img class="unnamed" src="{{ asset('frontend/assets/visa') }}/img/kuwait_visa.png"
                                alt="QR Code" />
                        </div>
                    </div>
                </div>
            </section>
            <section class="overlap-4">
                <div class="group-9">
                    <div class="overlap-5">
                        <img class="mask-group" src="{{ asset('frontend/assets/visa') }}/img/Mask group.png"
                            alt="Background pattern" />
                        <div class="group-10">
                            <div class="overlap-group-3">
                                <p class="text-wrapper-10">{{ $visa->nationality_ar }}</p>
                                <p class="text-wrapper-11">الجنسية</p>
                            </div>
                        </div>
                        <img class="STATE-KUWAIT"
                            src="{{ asset('frontend/assets/visa') }}/img/STATE 0F KUWAIT eVISA.png"
                            alt="State of Kuwait" />
                        <h2 class="text-wrapper-12">دولة الكويت</h2>
                        <h2 class="text-wrapper-13">تأشيرة إلكترونية</h2>
                        <div class="group-11">
                            <img class="image-4" src="data:image/png;base64,{{ $qrCode }}" alt="Visa QR Code">
                            <div class="overlap-6">
                                <p class="text-wrapper-14">Passport No.</p>
                                <p class="text-wrapper-15">{{ $visa->passport_no }}</p>
                            </div>
                            <p class="text-wrapper-16">رقم الجواز</p>
                            <p class="text-wrapper-17">{{ $visa->passport_issue_date }}</p>
                            <p class="text-wrapper-18">{{ $visa->passport_expiry_date }}</p>
                            <p class="text-wrapper-19">{{ $visa->passport_type_ar }}</p>
                        </div>
                        <div class="group-12">
                            <p class="text-wrapper-20">Visa Number</p>
                            <p class="text-wrapper-21">رﻗﻢ اﻟﺘﺄﺷﻴﺮة</p>
                            <p class="text-wrapper-22">{{ $visa->visa_number }}</p>
                        </div>
                        <div class="group-13">
                        @php
    // Ensure exactly 45 characters per line (pad with '<' if less, trim if more)
    $line1 = strlen($visa->barcode_text_up) < 45 
             ? str_pad($visa->barcode_text_up, 45, '<', STR_PAD_RIGHT) 
             : substr($visa->barcode_text_up, 0, 45);
    $line2 = strlen($visa->barcode_text_down) < 45 
             ? str_pad($visa->barcode_text_down, 45, '<', STR_PAD_RIGHT) 
             : substr($visa->barcode_text_down, 0, 45);
@endphp

<div class="overlap-7">
    <div class="group-14">
        <div class="overlap-group-4">
            <p class="VBKWTALI-ABDUL-MAZID fixed-width-line">
                {{ $line1 }}
            </p>
        </div>
    </div>
    <p class="div-2 fixed-width-line">
        <span class="span-2">{{ $line2 }}</span>
    </p>
</div>

                        </div>
                        <p class="text-wrapper-25">الكفيل</p>
                        <p class="text-wrapper-26">
                            {{ $visa->company_name_ar }}
                        </p>
                        <div class="group-17">
                            <p class="ABDUL-MAZID-AFSAR">
                                <span class="span">{{ $visa->full_name_en }}</span>
                            </p>
                            <p class="div-3">
                                <span class="span">{{ $visa->full_name_ar }}</span>
                            </p>
                            <p class="text-wrapper-30">Name</p>
                            <p class="text-wrapper-31">الإسم</p>
                        </div>
                        <div class="group-18">
                            <p class="text-wrapper-32">Birth Date</p>
                            <p class="text-wrapper-33">تاريخ الميلاد</p>
                            <p class="text-wrapper-34">{{ $visa->dob }}</p>
                        </div>
                        <div class="group-19">
                            <p class="text-wrapper-35">Reference</p>
                            <p class="div-4">
                                <span class="text-wrapper-36">رقم المر</span>
                                <span class="text-wrapper-37">جع</span>
                            </p>
                            <p class="text-wrapper-38">{{ $visa->moi_reference }}</p>
                        </div>
                        <div class="group-20">
                            <p class="text-wrapper-39">Issue Date</p>
                            <p class="text-wrapper-40">ﺗﺎرﻳﺦ اﻹﺻﺪار</p>
                            <p class="text-wrapper-41">{{ $visa->issue_date }}</p>
                        </div>
                        <div class="group-21">
                            <p class="text-wrapper-42">Visa Type</p>
                            <p class="text-wrapper-43">نوع التأشيرة</p>
                            <p class="text-wrapper-44">Expiry Date</p>
                            <p class="text-wrapper-45">تاريخ الإنتهاء</p>
                            <p class="text-wrapper-46">{{ $visa->expiry_date }}</p>
                            <p class="text-wrapper-47">Nationality</p>
                            <div class="overlap-8">
                                <p class="text-wrapper-48">Sex</p>
                                <p class="text-wrapper-49">{{ $visa->gender }}</p>
                            </div>
                            <div class="overlap-9">
                                <p class="text-wrapper-50">النوع</p>
                                <p class="text-wrapper-51">{{ $visa->gender_ar }}</p>
                            </div>
                            <p class="text-wrapper-52">{{ $visa->nationality_en }}</p>
                            <p class="text-wrapper-53">Occupation</p>
                            <p class="text-wrapper-54">{{ $visa->occupation_en }}</p>
                            <p class="text-wrapper-55"> {{ $visa->occupation_ar }}</p>
                            <p class="text-wrapper-56">المهنة</p>
                            <div class="group-22">
                                <p class="text-wrapper-57">{{ $visa->visa_type_ar }}</p>
                            </div>
                        </div>
                        <img class="STATE-f-KUWAIT"
                            src="{{ asset('frontend/assets/visa') }}/img/STATE 0F KUWAIT (1).png"
                            alt="State of Kuwait" />
                    </div>
                </div>
                <div class="rectangle-11"></div>
            </section>
        </div>
    </main>

    <button id="download-pdf" style="
    background-color: #007BFF;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    font-family: Arial, sans-serif;
    cursor: pointer;
    text-align: center;
    display: inline-block;
    text-decoration: none;
    margin-left: auto;
    margin-right: auto;
  ">
    Download PDF
  </button>
  

    <script>
        
        document.getElementById('download-pdf').addEventListener('click', function() {
            const {
                jsPDF
            } = window.jspdf;
            const element = document.getElementById('visa-details');

            // Set the scale to match A4 dimensions at 300 DPI
            const scale = 300 / 96; // 300 DPI / 96 DPI (default screen resolution)
            const pdfWidth = 210;
            const pdfHeight = 297;

            html2canvas(element, {
                scale: scale,
                useCORS: true,
                allowTaint: true,
                backgroundColor: '#FFFFFF'
            }).then(canvas => {
                const pdf = new jsPDF({
                    orientation: 'portrait',
                    unit: 'mm',
                    format: [pdfWidth, pdfHeight]
                });

                const imgData = canvas.toDataURL('image/jpeg', 1.0);

                // Add image at exact A4 dimensions without any scaling or positioning
                pdf.addImage(imgData, 'JPEG', 0, 0, pdfWidth, pdfHeight);

                pdf.save('visa-details.pdf');
            });
        });
    </script>
</body>

</html>
