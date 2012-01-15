{foreach from=$form item=f key=k}
	{if $f.type!="hidden"}
	<div class="fRow">
		{if $f.field.label}
		<label>{$f.field.label}</label>
		{/if}
		<div class="inputCell">
	{/if}
			{* INPUT TEXT *}
			{if $f.type=="input"}
			<input type="text" name="data[{$f.field.name}]" value="{$data[$f.field.name]}" class="{if $f.field.error && $error[$f.field.name]}error {/if}{$f.field.class}" style="{$f.field.style}" />
				{if $f.field.error && $error[$f.field.name]}
					<label class="error">{$f.field.error}</label>
				{/if}
			{/if}
			{* INPUT PASSWORD *}
			{if $f.type=="password"}
			<input type="password" name="data[{$f.field.name}]" value="{$data[$f.field.name]}" class="{$f.field.class}" style="{$f.field.style}" />
			{/if}
			{* INPUT HIDDEN *}
			{if $f.type=="hidden"}
			<input type="hidden" name="data[{$f.field.name}]" value="{$data[$f.field.name]}" class="{$f.field.class}" style="{$f.field.style}" />
			{/if}
			{* INPUT FILE *}
			{if $f.type=="file"}
			<div class="auHolder">
				<div class="auBtn">Browse</div>
				<input type="file" name="{$f.field.name}" class="{$f.field.class}" />
			</div>
			{/if}
			{* CHECKBOX *}
			{if $f.type=="checkbox"}
			<input type="checkbox" name="data[{$f.field.name}]" value="{$f.field.value}" class="{$f.field.class}" style="{$f.field.style}" {if $data[$f.field.name]==$f.field.value}checked="checked"{/if} />
			{/if}
			{* RADIO *}
			{if $f.type=="radio"}
			<input type="radio" name="data[{$f.field.name}]" value="{$f.field.value}" class="{$f.field.class}" style="{$f.field.style}" {if $data[$f.field.name]==$f.field.value}checked="checked"{/if} />
			{/if}
			{* TEXTAREA *}
			{if $f.type=="textarea"}
			<textarea name="data[{$f.field.name}]" class="{$f.field.class}" style="{$f.field.style}" {if $data[$f.field.name]==$f.field.value}checked="checked"{/if} >{$data[$f.field.name]}</textarea>
			{/if}
			{* SELECT *}
			{if $f.type=="select"}
			<select name="data[{$f.field.name}]" class="{$f.field.class}" style="{$f.field.style}" {if $data[$f.field.name]==$f.field.value}checked="checked"{/if} >
				{foreach from=$data[$f.field.option] item=sel_opt}
				<option value="{$sel_opt.value}" {if $data[$f.field.name]==$sel_opt.value}selected="selected"{/if}>{$sel_opt.title}</option>
				{/foreach}
			</select>
			{/if}
			{* BUTTON *}
			{if $f.type=="btn"}
			<input type="button" name="data[{$f.field.name}]" value="{$f.field.name}" class="{$f.field.class}" style="{$f.field.style}" />
			{/if}
			{* SUBMIT *}
			{if $f.type=="submit"}
			<input type="submit" name="data[{$f.field.name}]" value="{$f.field.name}" class="{$f.field.class}" style="{$f.field.style}" />
			{/if}
			{* SAVE APPLY CANCEL *}
			{if $f.type=="sac"}
			<input type="submit" name="data[save]" value="Save" class="fLeft {$f.field.class}" style="margin-right: 10px; {$f.field.style}" />
			<input type="submit" name="data[apply]" value="Apply" class="fLeft {$f.field.class}" style="margin-right: 10px; {$f.field.style}" />
			<input type="submit" name="data[cancel]" value="Cancel" class="fLeft {$f.field.class}" style="margin-right: 10px; {$f.field.style}" />
			{/if}
	{if $f.type!="hidden"}
		</div>
	</div>
	{/if}
{/foreach}