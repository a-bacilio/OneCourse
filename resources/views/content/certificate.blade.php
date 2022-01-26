<style>
    @page { margin:0px; }
    </style>
    <div style="margin:0;width:100%; height:100%;  background-position: center; background-repeat: no-repeat; background-size: 100% 100%; background-image:url({{asset($information->certificate_img)}}); ">
    <div style="position:absolute; top:{{$information->certificate_pos_y??'0'}}; left:{{$information->certificate_pos_x??'0'}}; font-size:{{$information->certificate_fontsize??'14px'}}">{{$user->name??"nombreusuario"}}</div>
</div>
