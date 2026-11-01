<?xml version="1.0" encoding="utf-8"?>
<!-- Transform FRITZ!Box telephone book into Cisco IP phonebook -->
<!-- MIT Licence -->
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="xml" indent="yes" encoding="utf-8" />

<xsl:template match="phonebooks/phonebook">
    <CiscoIPPhoneMenu>
        <Title>
            <xsl:value-of select="@name" />
        </Title>
        <Prompt>Kontakte</Prompt>
        <xsl:apply-templates select="contact" />
    </CiscoIPPhoneMenu>
</xsl:template>

<xsl:template match="contact">
    <MenuItem>
        <xsl:apply-templates select="person/realName | telephony/number" />
    </MenuItem>
</xsl:template>

<xsl:template match="person/realName">
        <Name>
            <xsl:value-of select="." />
        </Name>
</xsl:template>
        
<xsl:template match="telephony/number" >
    <!-- exclude fax numbers-->
    <xsl:if test="@type!='fax_work'">
        <URL>
            <xsl:value-of select="." />
        </URL>
    </xsl:if>
 </xsl:template>

</xsl:stylesheet>
