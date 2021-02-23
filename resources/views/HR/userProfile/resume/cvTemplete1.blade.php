<!doctype html>
<html>
	<head>
		<style>
			@import "https://www.super-resume.com/fonts.css";

			body {
				margin: 0;
			}
			p[sr-r-fld="title"] {
				page-break-after: avoid;
			}
			div[sr-r-resume] p,
			div[sr-r-resume] li, 
			[sr-r-block="text"] {
				page-break-inside: avoid;
			}
			div[sr-r-children] {
				page-break-before: avoid;
			}

			div[sr-r-resume] {
				margin: 0 auto 5em;
				color: #000;
				background-color: #fff;
			}
			div[sr-r-papersheet-inner] {
				margin: auto;
			}
			div[sr-r-block],
			div[sr-r-child]:not(:last-child) {
				padding: 2px;
			}
			div[sr-r-fld="html"], div[sr-r-fld="html"] * {
				line-height: 1.5em !important;
				margin-top: 0 !important;
				margin-bottom: 0 !important;
			}
			div[sr-r-resume] table {
				width: 100%;
				border-collapse: collapse;
			}
			div[sr-r-resume] td {
				vertical-align: top;
			}
			[sr-r-template="T6"] p {
				line-height: 1.4em;
				margin: 0 0 .6em;
			}
			[sr-r-template="T6"] p[sr-r-child][sr-r-fld="title"] {
				font-size: 1.2em;
				font-weight: bold;
				margin: 0;
			}
			[sr-r-template="T6"] p[sr-r-where] {
				font-size: 1.1em;
				margin: 0;
			}
			[sr-r-template="T6"] p[sr-r-dates] {
				font-size: 1em;
				color: #555;
				margin: 0 0 .5em;
			}
			[sr-r-template="T6"] p[sr-r-person] {
				font-size: 4em;
				margin-bottom: 0;
				line-height: 1.2em;
				margin-top: -.2em;
			}
			[sr-r-template="T6"] p[sr-r-fld="jobTitle"] {
				font-size: 1.2em;
				margin: 0;
			}
			[sr-r-template="T6"] div[sr-r-block="person"] p[sr-r-fld="location"] {
				font-size: 1em;
				color: #555;
				margin: 0;
			}
			[sr-r-template="T6"] span[sr-r-fld="where"] {
				color: #555;
				font-weight: bold;
			}
			[sr-r-template="T6"] p[sr-r-block][sr-r-fld="title"] {
				font-size: 1.3em;
				font-weight: bold;
				margin: 0 0 .5em 0;
				padding: 0 .5em .1em;
				text-transform: uppercase;
				background:{{$backgroundColor}};
				border: 1px solid{{$backgroundColor}};
                border-bottom-right-radius: 1.3em;
                color:{{$fontColor}};
			}
			[sr-r-template="T6"] div[sr-r-blocks] {
				margin-top: 1em;
			}
			[sr-r-template="T6"] div[sr-r-children] {
				margin-left: 2em;
			}
			[sr-r-template="T6"] td[sr-r-tbl-title] {
				width: 50%;
				padding: 0;
				border-top: .2em solid{{$backgroundColor}};
			}
			[sr-r-template="T6"] table[sr-r-tbl-title] {
				page-break-inside: avoid;
				page-break-after: avoid;
			}
			[sr-r-template="T6"] td[sr-r-tbl-top]:first-child {
				width: 65%;
			}
			[sr-r-template="T6"] td[sr-r-tbl-top]:last-child {
				width: 35%;
				text-align: right;
			}
			div[sr-r-resume="3557542"] {
				max-width: 210mm;
				font-size: 3.5mm;
				font-family: Raleway;
			}
			div[sr-r-resume="3557542"] div[sr-r-papersheet-inner] {
				padding-top: 15mm;
				width: 86%;
			}
			div[sr-r-resume="3557542"] div[sr-r-block="person"],
			div[sr-r-resume="3557542"] p[sr-r-fld="title"] {
				font-family: Roboto Condensed;
			}
			div[sr-r-resume="3557542"] div[sr-r-block],
			div[sr-r-resume="3557542"] div[sr-r-child]:not(:last-child) {
				margin-bottom: 1em;
			}
		</style>
	</head>
	<body>
		<div sr-r-resume="3557542" sr-r-template="T6" style='border: 2px solid {{$backgroundColor}}'>
			<div sr-r-papersheet-inner>
				<table style='border: 2px solid {{$backgroundColor}}'>
					<tr>
						<td sr-r-tbl-top style='background:{{$backgroundColor}};color:{{$fontColor}}'>
				<div sr-r-block="person">
					<p sr-r-person><span sr-r-fld="firstName">{{ $user_info->fullname}}</p>
					{{-- <p sr-r-fld="jobTitle">{{ $user_info->fullname}}</p> --}}
					<p sr-r-fld="location jobTitle">{{ $user_info->country.",".$user_info->city}}</p>
				</div>
						</td>
						<td sr-r-tbl-top>
							<div sr-r-block="contact">
								<div sr-r-fld="html">
									<p>{{ $user_info->email }}</p><p>{{ $user_info->phone }}</p><p>{{ $user_info->userWebsite }}</p>
								</div>
							</div>
						</td>
					</tr>
				</table>
				<div sr-r-blocks>
					<div sr-r-block="text" sr-r-id="1">
						<table sr-r-tbl-title><tr><td sr-r-tbl-title>
						<p sr-r-block sr-r-fld="title">Summary</p>
						</td><td sr-r-tbl-title></td></tr></table>
						<div sr-r-children>
							<div sr-r-fld="html">
								<p>{{ $user_info->aboutUser }}</p>
							</div>
						</div>
					</div>
					@if(count($experiences) > 0)
					<div sr-r-block="experience" sr-r-id="2">
						<table sr-r-tbl-title><tr><td sr-r-tbl-title>
						<p sr-r-block sr-r-fld="title">Work Experience</p>
						</td><td sr-r-tbl-title></td></tr></table>
						<div sr-r-children>
							@foreach ($experiences as $experience)
							<div sr-r-child sr-r-id="2c1">
								<p sr-r-child sr-r-fld="title">{{ $experience->title }}</p>
								<p sr-r-where><span sr-r-fld="where">{{ $experience->subtitle }}</span></p>
								{{-- <span sr-r-fld="location">Location</span> --}}
								<p sr-r-dates><span sr-r-fld="fromMonth">{{$experience->start_date}}</span>  &ndash; <span sr-r-fld="toMonth">{{$experience->end_date}}</span> </p>
								<div sr-r-fld="html">
									<p>{{$experience->description}}</p>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					@endif
					@if(count($educations) > 0)
					<div sr-r-block="education" sr-r-id="3">
						<table sr-r-tbl-title><tr><td sr-r-tbl-title>
						<p sr-r-block sr-r-fld="title">Education and Training</p>
						</td><td sr-r-tbl-title></td></tr></table>
						<div sr-r-children>
							@foreach ($educations as $education) 
							<div sr-r-child sr-r-id="3c1">
								<p sr-r-child sr-r-fld="title">{{ $education->title }}</p>
								<p sr-r-where><span sr-r-fld="where">{{ $education->subtitle }}</span></p>
								<p sr-r-dates><span sr-r-fld="fromYear">{{$education->start_date}}</span> &ndash; <span sr-r-fld="toYear">{{$education->end_date}}</span></p>
								<div sr-r-fld="html">
									<p>{{$education->description}}</p>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					@endif
					@if(count($projects) > 0)
					<div sr-r-block="education" sr-r-id="3">
						<table sr-r-tbl-title><tr><td sr-r-tbl-title>
						<p sr-r-block sr-r-fld="title">Education and Training</p>
						</td><td sr-r-tbl-title></td></tr></table>
						<div sr-r-children>
							@foreach ($projects as $project) 
							<div sr-r-child sr-r-id="3c1">
								<p sr-r-child sr-r-fld="title">{{ $project->title }}</p>
								<p sr-r-where><span sr-r-fld="where">{{ $project->subtitle }}</span></p>
								<p sr-r-dates><span sr-r-fld="fromYear">{{$project->start_date}}</span> &ndash; <span sr-r-fld="toYear">{{$project->end_date}}</span></p>
								<div sr-r-fld="html">
									<p>{{$project->description}}</p>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					@endif
					@if(count($languages) > 0)
					<div sr-r-block="education" sr-r-id="3">
						<table sr-r-tbl-title><tr><td sr-r-tbl-title>
						 <p sr-r-block sr-r-fld="title">Languages</p>
						 </td><td sr-r-tbl-title></td></tr></table>
						 <div sr-r-children>
							@foreach ($languages as $language)
							 <div sr-r-child sr-r-id="3c1">
										 <span sr-r-child="" sr-r-fld="title"  class='rows'>{{ $language->name }}</span>
							 </div>
							 @endforeach
						 </div>
					</div>
					@endif
					@if(count($languages) > 0)
                    <div sr-r-block="education" sr-r-id="3">
                       <table sr-r-tbl-title><tr><td sr-r-tbl-title>
                        <p sr-r-block sr-r-fld="title">Skills</p>
                        </td><td sr-r-tbl-title></td></tr></table>
						<div sr-r-children>
							@foreach ($skills as $skill)
							 <div sr-r-child sr-r-id="3c1">
										 <span sr-r-child="" sr-r-fld="title"  class='rows'>{{ $skill->name }}</span>
							 </div>
							 @endforeach
						</div>
					</div>
					@endif
					{{-- <div sr-r-block="text" sr-r-id="4">
						<table sr-r-tbl-title><tr><td sr-r-tbl-title>
						<p sr-r-block sr-r-fld="title">Additional Information</p>
						</td><td sr-r-tbl-title></td></tr></table>
						<div sr-r-children>
							<div sr-r-fld="html">
								<p>Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.</p>
							</div>
						</div>
					</div> --}}
				</div>
			</div>
		</div>
	</body>
</html>
