<?xml version="1.0" encoding="utf-8"?>
<!-- Transform FRITZ!Box telephone book into Yealink IP phonebook -->
<!-- Copyright Volker Püschel -->
<!-- MIT Licence -->
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="xml" indent="yes" encoding="utf-8" />



<xsl:template match="phonebooks/phonebook">
    <root_contact>
            <xsl:apply-templates select="contact" />
    </root_contact>
</xsl:template>

<xsl:template match="contact">
    <contact>
            <xsl:apply-templates select="person/realName | telephony/number" />
            <xsl:attribute name="line">-1</xsl:attribute>
            <xsl:attribute name="ring">Auto</xsl:attribute>
            <xsl:attribute name="default_photo">Resource:icon_family_b.png</xsl:attribute>
            <xsl:attribute name="selected_photo">0</xsl:attribute>
            <xsl:attribute name="group_id_name">All Contacts</xsl:attribute>
    </contact>
</xsl:template>

<xsl:template match="person/realName">
        <xsl:attribute name="display_name"><xsl:value-of select="." /></xsl:attribute>
</xsl:template>
        
<xsl:template match="telephony/number" >
    <!-- exclude fax numbers-->
    <xsl:if test="@type!='fax_work'">
        <xsl:attribute name="office_number"><xsl:value-of select="." /></xsl:attribute>
    </xsl:if>
 </xsl:template>

</xsl:stylesheet>