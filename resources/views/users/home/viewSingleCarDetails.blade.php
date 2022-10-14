<!DOCTYPE html>
<html lang="en">
<body>
  @foreach ($data as $d)
  <table>
    <tr>
      <td rowspan="9"><img src="{{asset('uploads/cars/'.$d->img)}}" height="400" width="450"></td>
      <td style="width:90%;padding-left:200px;">Brand Name: {{strtoupper($d->brand_name)}}</td>
    </tr>
    <tr>
      <td style="width:90%;padding-left:200px;">Model Name: {{strtoupper($d->model_name)}}</td>
    </tr>
    <tr>
      <td style="width:90%;padding-left:200px;">Year: {{strtoupper($d->year)}}</td>
    </tr>
    <tr>
      <td style="width:90%;padding-left:200px;">Color: {{strtoupper($d->color)}}</td>
    </tr>
    <tr>
      <td style="width:90%;padding-left:200px;">KMs Driven: {{strtoupper($d->kms_driven)}}</td>
    </tr>
    <tr>
      <td style="width:90%;padding-left:200px;">Capacity: {{strtoupper($d->capacity)}}</td>
    </tr>
    <tr>
      <td style="width:90%;padding-left:200px;">Ownership: {{strtoupper($d->ownership)}}</td>
    </tr>
    <tr>
      <td style="width:90%;padding-left:200px;">Registration Number: {{strtoupper($d->reg_no)}}</td>
    </tr>
    {{-- <tr>
      <td style="width:90%;padding-left:200px;">Decription: {{strtoupper($d->description)}}</td>
    </tr> --}}

    {{-- <tr><td style="width:90%;padding-left:200px;"><br>
      <button onclick="confirmbooking()" style= "border-radius:5px;background-color:#094d85;color:white;width:180px;height:40px;">Book</button>
      <button id="schedule" style= "border-radius:5px;background-color:#094d85;color:white;width:180px;height:40px;">Schedule test drive</button>
    </td> --}}

    @endforeach
  </table>
  <br>
  


</body>
</html>